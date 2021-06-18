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
  <link rel="icon" href="{{asset('file/img/brand/favicon.png')}}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('file/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('file/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('file/css/argon.css?v=1.2.0')}}" type="text/css">
   
</head>

<body class="bg-default">
    <div class="main-content">

        <!-- Header -->
        <div class="header bg-gradient-warning py-7 py-lg-8 pt-lg-9">
          <div class="container">
            <div class="header-body text-center mb-7">
              <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                  <h1 class="text-white">Welcome!</h1>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
              <div class="card bg-secondary border-0 mb-0">
                
                <div class="card-body px-lg-5 py-lg-5">
                  <div class="text-center text-muted mb-4">
                    <small>Sign in with credentials</small>
                  </div>
                  <form role="form" wire:submit.prevent="login()" method="post">
                  
                    <div class="form-group mb-3">
                      <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                        </div>
                        <input class="form-control" wire:model="email" name="email" placeholder="Email" type="email">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input class="form-control" wire:model="pass" name="password" placeholder="Password" type="password">
                      </div>
                    </div>
                    
                    <div class="text-center">
                      <input type="submit" class="btn btn-warning my-4" value="Login">
                    </div>
                  </form>
                </div>
              </div>
             
            </div>
          </div>
        </div>
      </div>
  <script src="{{asset('file/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('file/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('file/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{asset('file/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('file/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{asset('file/js/argon.js?v=1.2.0')}}"></script>
</body>

</html>