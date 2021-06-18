<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset('file/img/brand/favicon.png')}}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('file/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('file/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('file/css/argon.css?v=1.2.0')}}" type="text/css">

    
    <title>Document</title>
    @livewireStyles()
</head>
<body>
    <div class="wrapper ">
      
        @yield('content')
    </div>
    @livewireScripts()
    <script src="{{asset('file/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('file/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('file/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{asset('file/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('file/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{asset('file/js/argon.js?v=1.2.0')}}"></script>

    
</body>
</html>