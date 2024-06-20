@extends('app')

@push('css')
	<!-- Start your custom css -->
@endpush

@section('content')
	<div class="card">
		<div class="card-header">
			<div class="d-flex justify-content-between align">
				<h2>Add New Post</h2>
				<div><a href="{{route('post.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Back</a></div>
			</div>
		</div>
		<div class="card-body">

            <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('modules.post.partials.form')
			</form>
			
		</div>
	</div>
@endsection

@push('script')
	<!-- Start your custom js -->
	<script>
		"use strict";
        function toSlug(str) {
                str = str.toLowerCase();
                str = str.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
                str = str.replace(/[đĐ]/g, 'd');
                str = str.replace(/([^0-9a-z-\s])/g, '');
                str = str.replace(/(\s+)/g, '-');
                str = str.replace(/-+/g, '-');
                str = str.replace(/^-+|-+$/g, '');
                return str;
            }

        $(() => {
                let $title = $('#title');
                let $slug = $('#slug');                
                function update() {
                    $slug.val(toSlug($title.val()));
                }
                update();                
                $title.on('change', update);
        });

		$('#post_title').on('input', function (){
			// console.log('working');
			let name = $(this).val();
			let slug =  name.replace(/\s+/g, '-').toLowerCase()		
			slug.length > 75 ? slug.substring(0,75) : $('#post_slug').val(slug)
			name.length > 60 ? name.substring(0,60) : $('#meta_title').val(name)
			$('#meta_keywords').val(name.replaceAll(' ', ', '))
		})


        $('#description').on('input', function (){
            var description = tinymce.get("description").getContent();
            if(description.length > 155){
                description = description.substring(0,155) + "..."
            }
            $('#meta_keywords').val(description)
        })

	</script>

	<x-head.tinymce-config/>
@endpush