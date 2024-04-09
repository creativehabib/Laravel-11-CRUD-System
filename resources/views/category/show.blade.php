@extends('category.layout')
@section('content')
	<div class="card mt-4">
		<div class="card-header">
			<h2>Show Category</h2>
		</div>
		<div class="card-body">
			<div class="d-grid grap-2 d-md-flex justify-content-md-end">
				<a href="{{route('category.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Name:</strong> <br/>
						{{ $category->name }}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2">
					<div class="form-group">
						<strong>Description:</strong> <br/>
						{{ $category->description }}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2">
					<div class="form-group">
						<strong>Image:</strong> <br/>
						<img src="{{image_url($category->image)}}" alt="" class="w-50">
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection