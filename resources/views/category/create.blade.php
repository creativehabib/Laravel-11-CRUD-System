@extends('category.layout')
@section('content')
	<div class="card mt-5">
		<div class="card-header">
			<h2>Add New Category</h2>
		</div>
		<div class="card-body">
			<div class="d-grid grap-2 d-md-flex justify-content-md-end">
				<a href="{{route('category.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
			</div>

            <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('category.partials.form')
                <button type="submit" class="btn btn-sm btn-success"><i class="fa-solid fa-floppy-disk"></i> Add Category</button>
            </form>
			
		</div>
	</div>
@endsection