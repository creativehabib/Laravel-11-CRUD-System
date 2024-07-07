<script src="https://cdn.tiny.cloud/1/t3ue4oohfwnuwd4kadmho2qwnhd4l82c4r76v4obczrbn9eo/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        const useDarkMode = window.matchMedia('(prefers-color-scheme: light)').matches;
        const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;

        tinymce.init({
            path_absolute: '/',
            selector: '#description',
            plugins: 'preview importcss searchreplace casechange autolink editimage autosave save directionality code visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons accordion',
            editimage_cors_hosts: ['picsum.photos'],
            menubar: false,
            toolbar: "undo redo | accordion accordionremove | blocks fontfamily fontsize | bold italic underline strikethrough | align numlist bullist | link image | table media | lineheight outdent indent| forecolor backcolor removeformat | charmap emoticons | code fullscreen preview | save print | pagebreak anchor codesample | ltr rtl casechange",
            autosave_ask_before_unload: true,
            autosave_interval: '30s',
            autosave_prefix: '{path}{query}-{id}-',
            autosave_restore_when_empty: false,
            autosave_retention: '2m',
            /* and here's our custom image picker*/
            image_title: true,
            automatic_uploads: true,
            images_upload_url:'/tinymce_images',
            file_picker_types:'image',
            file_picker_callback: (cb, value, meta) => {
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.addEventListener('change', (e) => {
                const file = e.target.files[0];

                const reader = new FileReader();
                reader.addEventListener('load', () => {
                    /*
                    Note: Now we need to register the blob in TinyMCEs image blob
                    registry. In the next release this part hopefully won't be
                    necessary, as we are looking to handle it internally.
                    */
                    const id = 'blobid' + (new Date()).getTime();
                    const blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    const base64 = reader.result.split(',')[1];
                    const blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);

                    /* call the callback and populate the Title field with the file name */
                    cb(blobInfo.blobUri(), { title: file.name });
                });
                reader.readAsDataURL(file);
                });

                input.click();
            },
            image_advtab: true,
            branding: false,
            resize: 'both',
            height: 350,
            paste_as_text: true,
            link_default_target: '_blank',
            link_default_protocol: 'https',
            quickbars_image_toolbar: 'alignleft aligncenter alignright | rotateleft rotateright | imageoptions',
            images_upload_credentials: true,
            quickbars_selection_toolbar: 'bold italic underline | quicklink h2 h3 blockquote quickimage quicktable',

            images_upload_handler: function (blobInfo, success, failure) {
                var xhr, formData;
                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', '{{ route("image_upload") }}');
                var token = '{{ csrf_token() }}';
                xhr.setRequestHeader("X-CSRF-Token", token);
                xhr.onload = function() {
                    var json;
                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }
                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }
                    success(json.location);
                };
                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                xhr.send(formData);
            }
        });
    </script>
