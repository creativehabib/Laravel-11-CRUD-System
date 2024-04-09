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
                @include('category.partials.form')
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
            </form>
            
		</div>
	</div>
@endsection