@extends('app')
@push('css')
	<!-- Start your custom css -->
@endpush

@section('content')
	<div class="card">
		<div class="card-body">
			<div class="d-grid grap-2 d-md-flex justify-content-md-end">
				<a href="{{route('category.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
			</div>

            <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('modules.category.partials.form')
            </form>

		</div>

	</div>
@endsection

@push('script')
<!-- Start your custom js -->
<script>
	$('#name').on('input', function (){
		console.log('working');
		let name = $(this).val();
		let slug =  name.replace(/\s+/g, '-').toLowerCase()

		slug.length > 75 ? slug.substring(0,75) : $('#slug').val(slug)
	})


	document.getElementById('description').onkeyup = (e) => {
            const value = e.target.value;
            console.log(value);
            saveValueToLocalStorage('meta_description', value);
        };
</script>
<x-head.tinymce-config/>
@endpush
