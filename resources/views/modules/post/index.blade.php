@extends('app')
@section('content')
	<div class="card">
		<div class="card-body">
			@session('success')
            	<div class="alert alert-success" role="alert"> {{ $value }} </div>
        	@endsession
			<div class="d-flex align-middle justify-content-between">
				<div class="w-25">
					<form>
						<div class="d-flex">
							<input type="text" name="search" id="search" class="form-control" placeholder="Search here...">
							<button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i></button>
						</div>
					</form>
				</div>
				<div class="">
					<a href="{{route('posts.create')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add Post</a>
				</div>
			</div>
			<table class="table table-bordered table-striped mt-4">
				<thead>
					<tr>
						<th width="80px" class="text-center">SL</th>
						<th>Name</th>
                        <th>Created By</th>
						<th class="text-center">Category</th>
						<th class="text-center">Status</th>
						<th>Description</th>
						<th class="text-center" width="100px">Image</th>
						<th width="150px" class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($posts as $post)
						<tr class="align-middle">
							<td class="text-center">{{$loop->iteration}}</td>
							<td>{{$post->post_title}}</td>
                            <td>{{$post->created_by?->name}}</td>
							<td class="text-center"><a href="{{route('categories.edit',$post->category?->id ?? 1) ?? null }}">{{$post->category?->name}}</a></td>
							<td class="text-center">
								@if($post->status == \App\Models\Post::STATUS_ACTIVE)
									<i class="fas fa-circle-check text-success"></i>
								@else
									<i class="fa-regular fa-circle-xmark text-danger"></i>
								@endif
							</td>
							<td>{!! htmlspecialchars_decode($post->post_description) !!}</td>
							<td class="text-center"><img src="{{staticAsset($post->image?->media_file ?? 'assets/image/default-image.jpg')}}" alt="{{$post->image?->media_alt ?? 'Not alt title'}}" class="img-thumbnail"></td>
							<td class="text-center">
								<form method="POST" action="{{route('posts.destroy',$post->id)}}">
									<a href="{{route('posts.show',$post->id)}}" class="btn btn-sm btn-info text-white"><i class="fa-solid fa-eye"></i></a>
									<a href="{{route('posts.edit',$post->id)}}" class="btn btn-sm btn-primary text-white"><i class="fa-solid fa-pencil"></i></a>
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-sm btn-danger text-white" onclick="return confirm('Are you sure delete it?');"><i class="fa-solid fa-trash-can"></i></button>
								</form>
							</td>
						</tr>
					@empty
						<tr><td class="text-center" colspan="8">There are no data found</td></tr>
					@endforelse
				</tbody>
			</table>
			{{$posts->links()}}
		</div>
	</div>
@endsection
