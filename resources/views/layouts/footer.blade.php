        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{asset('assets/js/app.js')}}"></script>
        @stack('script')
        <!-- localizations & others -->
        <script>
        let RecordId = "";


            var TT = TT || {};
            TT.localize = {
                no_data_found: '{{ __('No data found') }}',
                selected_file: '{{ __('Selected File') }}',
                selected_files: '{{ __('Selected Files') }}',
                file_added: '{{ __('File added') }}',
                files_added: '{{ __('Files added') }}',
                no_file_chosen: '{{ __('No file chosen') }}',
                pleaseWait: '{{ __('Please wait') }}..',
                createContent: '{{ __('Create Content') }}',
                generateCode: '{{ __('Generate Code') }}',
                generateImage: '{{ __('Generate Image') }}',
                moveToFolder: '{{ __('Move To Folder') }}',
                moveProject: '{{ __('Move Project') }}',
                saveChanges: '{{ __('Save Changes') }}',
            };
            TT.baseUrl = '{{ \Request::root() }}';

            // on click delete confirmation -- outside footable
            function confirmDelete(thisLink) {
                const url = $(thisLink).data("href");
                $("#delete-modal").modal("show");
                $("#delete-link").attr("href", url);
            }

            // on click Hidden confirmation -- outside footable
            function confirmHidden(thisLink) {
                const url = $(thisLink).data("href");
                $("#hide-modal").modal("show");
                $("#hide-link").attr("href", url);
            }

            // on click all delete confirmation -- outside footable
            function confirmAllDelete(thisLink) {
                const url = $(thisLink).data("href");
                $("#all-delete-modal").modal("show");
                $("#all-delete-link").attr("href", url);
            }


          function onMediaModalView(id) {
            $.ajax({
                type: "POST",
                url: window.location.origin + "/getMediaById",

                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": + id
                },
                success: function (response) {
                    $("#RecordId").val(response.id);
                    $("#title").val(response.media_title);
                    $("#alternative_text").val(response.media_alt);
                    $("#thumbnail").val(
                        window.location.origin + "/" + response.media_file
                    );

                    if (response.media_file != null) {
                        $("#media_preview_img").html(
                            '<img class="img-fluid img-thumbnail" src="' +
                                response.media_file +
                                '" alt="' +
                                response.media_title +
                                '">'
                        );
                    } else {
                        $("#media_preview_img").html("");
                    }
                },
            });
        }


        //Reset input file
        $('input[type="file"][name="media_file"]').val('');

        $('input[type="file"][name="media_file"]').on('change',function() {
            const img_path = $(this)[0].value;
            const img_holder = $('#media_preview_img');
            const currentImagePath = $(this).data('value');
            const extension = img_path.substring(img_path.lastIndexOf('.') + 1).toLowerCase();
            if(extension === 'jpg' || extension === 'jpeg' || extension === 'png' || extension === 'webp'){
                if(typeof(FileReader) != 'undefined'){
                    img_holder.empty();
                    const reader = new FileReader();
                    reader.onload = function(e){
                        $('<img/>', {'src':e.target.result, 'class':'img-fluid mw-100 mb-10'}).appendTo(img_holder)
                    }
                    img_holder.show();
                    reader.readAsDataURL($(this)[0].files[0]);
                }else{
                    $(img_holder).html('This browser not support FileReader');
                }
            }else{
                $(img_holder).html(currentImagePath);
            }
        });

        $(document).on('click', '#clearInputFile', function(){
            const form = $(this).closest('form');
            $(form).find('input[type="file"]').val('');
            $(form).find('#media_preview_img').html($(form).find('input[type="file"]').data('value'));
        });


        //Update Media
        $('#DataEntry_formId').on('submit', function(e){
            e.preventDefault();
            const data = new FormData(this);
            data.append("media_file", $("#mediaImage")[0].files[0]);
            $.ajax({
                url: window.location.origin + "/mediaUpdate",
                type: "POST",
                data: data,
                contentType: false,
                processData: false,
                beforeSend:function(){

                },
                success: function (response) {
                    if (response.msgType === "success") {
                        alert(response.msg);
                        const bsOffcanvas = bootstrap.Offcanvas.getInstance('#offcanvasRight');
                        bsOffcanvas.hide();
                        setTimeout(function(){// wait for 5 secs(2)
                            location.reload(); // then reload the page.(3)
                        }, 400);
                    } else {
                    }
                },
            })
        });

        </script>

        <!-- media-manager scripts -->
        @include('inc.media-manager.uppyScripts');

    </body>
</html>
