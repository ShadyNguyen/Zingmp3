<!DOCTYPE html>
<html lang="vi" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="root-url" data-index="{{ URL::to('/'); }}">

    <title>Admin - @yield('title')</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- End bootstrap -->
    <link rel="stylesheet" href="{{ url('public/admin/css/site.css') }}">
    <link rel="stylesheet" href="{{ url('public/admin/css/layouts/header.css') }}">
    <link rel="stylesheet" href="{{ url('public/admin/css/layouts/sidebar.css') }}">

    <!-- Font awesom -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- End Font awesom -->
    @yield('css')

</head>

<body>
    <div class="page">
        @include('layouts/admin/layoutItems/header')

        @include('layouts/admin/layoutItems/sidebar')

        <div class="main-content">
            <div class="wrapper-main-content">
                <h2>@yield('title-content')</h2>
                @yield('content')
            </div>
        </div>
    </div>



    <!-- bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- End bootstrap JS -->

    <!-- axios JS -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- End axios JS -->
    
    <!-- theme JS -->
    <script src="{{  url('public/admin/js/site.js')  }}"></script>
    <!-- End theme JS -->

    <!-- theme JS -->
    <script src="{{  url('public/admin/js/changeTheme.js')  }}"></script>
    <!-- End theme JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @yield('js')
</body>

</html>