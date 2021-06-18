<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard

* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
  <!-- Favicon -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css')}}" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/now-ui-dashboard.css?v=1.5.0')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('assets/demo/demo.css')}}" rel="stylesheet" />
   @livewireStyles()
</head>

<body class="bg-default">
  @include('partial.sidebar')
    @yield('content')
      @livewireScripts()
      <script src="{{asset('/assets/js/core/jquery.min.js')}}"></script>
      <script src="{{asset('/assets/js/core/popper.min.js')}}"></script>
      <script src="{{asset('/assets/js/core/bootstrap.min.js')}}"></script>
      <script src="{{asset('/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
      <!-- Chart JS -->
      <script src="{{asset('/assets/js/plugins/chartjs.min.js')}}"></script>
      <!--  Notifications Plugin    -->
      <script src="{{asset('/assets/js/plugins/bootstrap-notify.js')}}"></script>
      <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
      <script src="{{asset('/assets/js/now-ui-dashboard.min.js?v=1.5.0')}}" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
      <script src="{{asset('/assets/demo/demo.js')}}"></script>
</body>

</html>