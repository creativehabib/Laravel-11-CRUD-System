<div class="form-group mb-3">
    <label class="form-label" for="name">Name:</label>
    <input 
        type="text"
        name="name"
        id="name"
        value="{{ old('name', $category->name ?? '') }}"
        class="form-control @error('name') is-invalid @enderror"
        placeholder="Exa. category name">
        @error('name')
            <div class="form-text text-danger">{{ $message }}</div>
        @enderror
  </div>

<div class="form -group mb-3">
    <label for="description" class="form-label">Description:</label>
    <textarea 
        class="form-control @error('description') is-invalid @enderror"
        id="description"
        name="description"
        placeholder="Enter description"
        rows="5"
        >{{ old('description', $category->description ?? '') }}</textarea>
        @error('description')
            <div class="form-text text-danger">{{$message}}</div>
        @enderror
</div>
<div class="form-group mb-3">
    <label for="image" class="form-label">Category Image:</label>
    <img src="{{$category->image != null ? image_url($category->image) : asset('assets/image/default-image.jpg')}}" class="img-fluid d-block img-thumbnail w-25" id="image_upload" alt="...">
    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image_upload_input">
    @error('image')
        <div class="form-text text-danger">{{$message}}</div>
    @enderror
</div>