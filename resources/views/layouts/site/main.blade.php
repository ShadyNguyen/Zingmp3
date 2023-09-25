<!DOCTYPE html>
<html lang="vi" data-theme="purple">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ url('public/site/img/logo-icon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ url('public/site/css/themes/themes.css') }}">
    <link rel="stylesheet" href="{{ url('public/site/css/site.css') }}">
    <link rel="stylesheet" href="{{ url('public/site/css/layouts/header.css') }}">
    <link rel="stylesheet" href="{{ url('public/site/css/layouts/sidebar.css') }}">
    <link rel="stylesheet" href="{{ url('public/site/css/layouts/playMusic.css') }}">


    <title>@yield('title') - Toanf-messi</title>

    @yield('css')
</head>
<body>
    <div class="bg-overlay">

    </div>
    <div class="wrapper">
        <!-- header -->
        @include('layouts/site/layoutItems/header')

        <!-- sidebar -->
        @include('layouts/site/layoutItems/sidebar')

        <div class="content">
            
            <div class="test"> </div>            
            @yield('content')
        </div>

        <!-- playMusic -->
        @include('layouts/site/layoutItems/playMusic')

        <div class="notification d-flex justify-content-center align-items-center" id="notification">
            <p>Đã thêm <strong>Toanf</strong> vào danh sách phát</p>
            
            <div class="icon-notification wrapper-icon justify-content-between"><i class="fa-solid fa-xmark " onclick="closeNotification('notification')"></i></div>
        </div>
    </div>
    

    <script>

        // notification
        function addNotification(id){
            
            document.getElementById(id).classList.remove('hidden');
        }
        function closeNotification(id){
            document.getElementById(id).classList.add('hidden');
        }
        const closeOverlay = ()=>{
                event.preventDefault();
                document.querySelector('aside').classList.remove('hidden');
                document.querySelector('.bg-overlay').classList.remove('bg-overlay-sidebar');
                
            }
        // sidebar
        function toggleSidebar(show){

            
            if(show){
                document.querySelector('aside').classList.add('hidden');
                document.querySelector('.bg-overlay').classList.add('bg-overlay-sidebar');
                document.querySelector('.bg-overlay-sidebar').addEventListener('click',closeOverlay );

            }else{
                document.querySelector('.bg-overlay-sidebar').removeEventListener('click',closeOverlay );

                closeOverlay();
            }
            
        }

        
    </script>
</body>
</html>