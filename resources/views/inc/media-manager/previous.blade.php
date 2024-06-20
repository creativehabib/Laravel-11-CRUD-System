@forelse ($mediaFiles as $key => $mediaFile)
    <div class="tt-media-item" data-active-file-id="{{ $mediaFile->id }}"
        onclick="handleSelectedFiles({{ $mediaFile->id }})">
        <div class="tt-media-img">
            @if ($mediaFile->media_type == 'image')
                <img src={{ uploadedAsset($mediaFile->id) }} class="img-fluid" />
            @else
            @endif

        </div>
        <div class="tt-media-info-wrap p-2">
            <div class="tt-media-info">
                <p class="fs-base mb-0 text-truncate">{{ $mediaFile?->media_title }}</p>
                <span class="text-muted fs-sm text-truncate">{{ $mediaFile->media_extension }}</span>
            </div>
        </div>

        
            <div class="tt-media-action-wrap d-flex align-items-center justify-content-center">
                <a class="tt-remove btn btn-sm px-2 btn-danger media-delete-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Remove this file" data-href="{{ route('uppy.delete', $mediaFile->id) }}" onclick="confirmDelete(this)"><i
                class="fa fa-trash"></i></a>

                <a class="btn btn-sm px-2 btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" data-href="{{ route('mediaUpdate', $mediaFile->id) }}" onclick="onMediaModalView({{$mediaFile->id}})"><i
                class="fa fa-edit"></i></a>
            </div>


    </div>

@empty
    <div class="text-center text-danger p-5">{{ __('No data found') }}</div>
@endforelse
