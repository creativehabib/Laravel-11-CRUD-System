@extends('app')
@section('content')
	<div class="card">
		<div class="card-body">
			<div class="d-grid grap-2 d-md-flex justify-content-md-end">
				<a href="{{route('posts.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Name:</strong> <br/>
						{{ $post->post_title }}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2">
					<div class="form-group">
						<strong>Slug:</strong><br>
						{{ $post->post_slug }}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2">
					<div class="form-group">
						<strong>Status:</strong> <br/>
						@if($post->status == \App\Models\Post::STATUS_ACTIVE)
							<i class="fas fa-circle-check text-success"></i>
						@else
							<i class="fa-regular fa-circle-xmark text-danger"></i>
						@endif
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2">
					<div class="form-group">
						<strong>Description:</strong> <br/>
						{!! htmlspecialchars_decode($post->post_description) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2">
					<div class="form-group">
						<strong>Post Category</strong><br>
						{{ $post->category?->name }}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2">
					<div class="form-group">
						<strong>Image:</strong> <br/>
						<img src="{{staticAsset($post->image?->media_file ?? 'assets/image/default-image.jpg')}}" alt="{{$post->image?->media_alt ?? 'Not alt title'}}" class="img-thumbnail w-25">
					</div>
				</div>

                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Meta Title:</strong> <br/>
                        {{$post->seo?->meta_title}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Meta Description:</strong> <br/>
                        {{$post->seo?->meta_description}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Meta Keywords:</strong> <br/>
                        {{$post->seo?->meta_keywords}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Meta Image:</strong> <br/>
                        <img src="{{ staticAsset($post->seo?->image->media_file ?? 'assets/image/default-image.jpg') }}" alt="{{ $post->seo?->image->media_alt ?? 'Not alt title' }}" class="img-thumbnail w-25">
                    </div>
                </div>
			</div>
		</div>
	</div>
@endsection
