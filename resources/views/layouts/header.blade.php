<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Laravel 11 CRUD Application - creativehabib.com</title>
        <link rel="icon" type="image/x-icon" href="{{ staticAsset('assets/image/favicon-16x16.png')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
        <link rel="stylesheet" href="{{ staticAsset('assets/css/style.css')}}">
        <style type="text/css">
            .dropdown-menu[data-bs-popper] {left: -87px;}
        </style>
        @stack('css')
    </head>
<body>