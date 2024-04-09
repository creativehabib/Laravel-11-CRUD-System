@extends('category.layout')
@section('content')
	<div class="card mt-4">
		<div class="card-header">
			<h2>Edit Category</h2>
		</div>
		<div class="card-body">
			<div class="d-grid grap-2 d-md-flex justify-content-md-end">
				<a href="{{route('category.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
			</div>

            <form action="{{route('category.update', $category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
				@method('PUT')
                <div class="mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input 
                        type="text"
                        name="name"
                        id="name"
                        value="{{old('name',$category->name)}}"
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="Exa. category name">
                        @error('name')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea 
                        class="form-control @error('description') is-invalid @enderror"
                        id="description"
                        name="description"
                        placeholder="Enter description" 
                        >{{old('description',$category->description)}}</textarea>
                    @error('description')
                        <div class="form-text text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image Upload</label>
                    <img src="{{image_url($category->image)}}" class="img-fluid d-block img-thumbnail w-25" id="image_upload" alt="...">
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image_upload_input">
                    @error('image')
                        <div class="form-text text-danger">{{$message}}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>

            </form>
		</div>
	</div>
@endsection