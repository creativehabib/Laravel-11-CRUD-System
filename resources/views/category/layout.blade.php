<!DOCTYPE html>
<html>
<head>
    <title>Laravel 11 CRUD Application - ItSolutionStuff.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    
<div class="container">
    @yield('content')
</div>
    
<script>
    $('#image_upload_input').on('change', function (e){
        let image = e.target.files[0]
        $('#image_upload').attr('src', URL.createObjectURL(image))
    })
</script>
</body>
</html>