@foreach ($mediaFiles as $mediaFile)
    <div class="avatar avatar-xl selected-file object-fit-cover border rounded img-fluid">
        <img class="img-thumbnail" src="{{ uploadedAsset($mediaFile->id) }}" alt="">
        <span class="tt-remove" onclick="removeSelectedFile(this, {{ $mediaFile->id }})"><i class="fa fa-trash"></i></span>
    </div>
@endforeach

