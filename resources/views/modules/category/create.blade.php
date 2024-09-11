@extends('app')
@push('css')
	<!-- Start your custom css -->
@endpush

@section('content')
	<div class="card">
		<div class="card-body">
			<div class="d-grid grap-2 d-md-flex justify-content-md-end">
				<a href="{{route('categories.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
			</div>

            <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
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
        name.length > 60 ? name.substring(0,60) : $('#meta_title').val(name)
        $('#meta_keywords').val(name.replaceAll(' ', ', '))
	})


    $('#description').on('input', function (){
        var description = $(this).val();
        console.log('working');
        if(description.length > 155){
            description = description.substring(0,155) + "..."
        }
        $('#meta_description').val(description)
    })

</script>
@endpush
