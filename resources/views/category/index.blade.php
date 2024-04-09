@extends('category.layout')
@section('content')
	<div class="card mt-5">
		<div class="card-header">
			<h2>Laravel 11 CRUD Example from scratch - creativehabib</h2>
		</div>
		<div class="card-body">
			@session('success')
            	<div class="alert alert-success" role="alert"> {{ $value }} </div>
        	@endsession
			<div class="d-grid grap-2 d-md-flex justify-content-md-end">
				<a href="{{route('category.create')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add Category</a>
			</div>

			<table class="table table-bordered table-striped mt-4">
				<thead>
					<tr>
						<th width="80px">SL</th>
						<th>Name</th>
						<th>Description</th>
						<th class="text-center" width="100px">Image</th>
						<th width="250px" class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($categories as $category)
						<tr class="align-middle">
							<td>{{$loop->iteration}}</td>
							<td>{{$category->name}}</td>
							<td>{{$category->description}}</td>
							<td class="text-center"><img src="{{image_url($category->image)}}" alt="" class="img-thumbnail"></td>
							<td class="text-center">								
								
								<form method="POST" action="{{route('category.destroy',$category->id)}}">
									<a href="{{route('category.show',$category->id)}}" class="btn btn-sm btn-info text-white"><i class="fa-solid fa-eye"></i> Show</a>
									<a href="{{route('category.edit',$category->id)}}" class="btn btn-sm btn-primary text-white"><i class="fa-solid fa-pencil"></i> Edit</a>
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-sm btn-danger text-white" onclick="return confirm('Are you sure delete it?');"></i> Delete</button>
								</form>
							</td>
						</tr>
					@empty
						<tr><td class="text-center" colspan="5">There are no data found</td></tr>
					@endforelse
				</tbody>
			</table>
			{{$categories->links()}}
		</div>
	</div>
@endsection