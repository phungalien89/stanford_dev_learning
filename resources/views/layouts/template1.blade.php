<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/my_style.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/bc8527f611.js"></script>
</head>
<style>
    @font-face{
        font-family: fontAwesome-r;
        src: url('fonts/fa-regular-400.woff');
    }
    @font-face{
        font-family: fontAwesome-s;
        src: url('fonts/fa-solid-900.woff');
    }
    .nav-item a{
        color: white;
    }
    .nav-item a:active{
        box-shadow: 0 0 0 3px rgba(0, 255, 100, 0.75);
    }
    .nav-item a:hover{
        color: white;
        background-color: var(--bs-green);
    }
    .nav-item .active{
        background-color: var(--bs-green);
        position: relative;
    }
    /* .nav-item .active::after{
        content: "";
        position: absolute;
        top: 105%;
        left: 50%;
        transform: translateX(-50%);
        border: solid;
        border-width: 5px 10px 0px 10px;
        border-color: var(--bs-primary) transparent transparent transparent;
    } */
    .nav-item .active::after{
        content: attr(data-icon);
        font-family: fontAwesome-s;
        position: absolute;
        top: 80%;
        left: 50%;
        transform: translateX(-50%);
        color: var(--bs-orange);
    }
</style>
<body>
    @includeIf('layouts.navbar')
    <div class="container">
        <div class="alert alert-success">
            <div class="fw-bolder fs-2 text-center">Hệ thống sách trực tuyến</div>
        </div>
        @yield('noidung')
    </div>
</body>
</html>