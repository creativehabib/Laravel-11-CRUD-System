@extends('app')
@section('content')
	<div class="card">
		<div class="card-body">
			<div class="d-grid grap-2 d-md-flex justify-content-md-end">
				<a href="{{route('posts.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
			</div>

            <form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
				@method('PUT')
                @include('modules.post.partials.form')
            </form>

		</div>
	</div>
@endsection

@push('script')
{{--<x-head.tinymce-config/>--}}

<script>
	// runs when the document is ready --> for media files
	$(document).ready(function() {
		getChosenFilesCount();
		showSelectedFilePreviewOnLoad();
    });
</script>
@endpush
