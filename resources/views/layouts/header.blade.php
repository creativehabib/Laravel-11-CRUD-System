<head>
    <title>Laravel 11 CRUD Application - creativehabib.com</title>
    <link rel="icon" type="image/x-icon" href="{{ staticAsset('assets/image/favicon-16x16.png')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
{{--        <link href="{{ staticAsset('assets/css/bootstrap.min.css') }}" rel="stylesheet">--}}
{{--        <link href="{{ staticAsset('assets/css/all.min.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{ staticAsset('assets/css/style.css')}}">
        {{-- CKEditor CDN --}}
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <style type="text/css">
        .dropdown-menu[data-bs-popper] {left: -87px;}
        .sticky-top {z-index: 8;}
    </style>
    @stack('css')
</head>
