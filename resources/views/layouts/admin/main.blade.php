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
    <link rel="stylesheet" href="{{ url('public/admin/css/toast.css') }}">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />


    <!-- Font awesom -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-light.css">
    <!-- End Font awesom -->
    @yield('css')

</head>

<body>
    <div id="toast_custom"></div>
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

    <input type="hidden" value="{{ Auth::guard('admin')->user()->id }}" id="__idUser">

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

    <!-- toast JS -->
    <script src="{{  url('public/admin/js/toast.js')  }}"></script>
    <!-- End toast JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const __ID_USER = document.getElementById('__idUser');
    </script>
    @yield('js')
</body>

</html>