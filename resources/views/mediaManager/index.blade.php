@extends('app')
@section('content')
    <section class="tt-section pt-4 pb-5">
        <div class="container">
            <div class="row g-4 mb-4">
                <div class="col-12">
                    <div data-type="media-index">
                        @include('inc.media-manager.media-manager-content')
                    </div>
                </div>
            </div>
        </div>
    </section>


<div class="offcanvas offcanvas-end w-25" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasRightLabel">Media/Image Manage</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
      <div id="media_preview_img" class="mb-4"></div>
        <form id="DataEntry_formId" method="post" enctype="multipart/form-data">
            @csrf

            <div class="space-y-4">
                <div class="form-group mb-3">
                    <label for="title" class="form-level">Media Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Type product name" required="">
                </div>
                <div class="form-group  mb-3">
                    <label for="alternative_text" class="form-level">Media Alt Text</label>
                    <input type="text" name="alternative_text" id="alternative_text" class="form-control" required="">
                </div>
                <div class="form-group mb-3">
                    <label for="mediaImage" class="form-level">Media File <button id="clearInputFile" type="button" class="btn btn-sm text-danger">Clear</button></label>
                    <input type="file" name="media_file" id="mediaImage" class="form-control">
                </div>

                <div>
                    <button type="submit" id="submit-form" class="btn btn-sm btn-primary">Update</button>
                    <button type="button" data-bs-dismiss="offcanvas" aria-label="Close" class="btn btn-sm btn-secondary">Cancel</button>
                </div>
            </div>
            <input type="hidden" name="RecordId" id="RecordId" />
        </form>
  </div>
</div>
@endsection

@push('script')
    <script>
        // runs when the document is ready --> for media files
        $(document).ready(function() {
            getMediaFiles();
        });

    </script>
@endpush
