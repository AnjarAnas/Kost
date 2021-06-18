
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
              <form wire:submit.prevent="login()" method="post">
              
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" wire:model='email' name="email" placeholder="Email" type="email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" wire:model="pass" name="password" id="pass" placeholder="Password" type="password">
                    
                  </div>
                  <div class="form-check m-2">
                    <input class="form-check-input" onclick="showPass()" type="checkbox" value="" id="show">
                    <small>Show Password</small> 
                  </div>
                  
                </div>
                
                <div class="text-center">
                  <input type="submit" class="btn btn-warning my-2" value="Login">
                </div>
              </form>
            </div>
          </div>
         
        </div>
      </div>
    </div>
  </div>
  <script>
    function showPass(){
      var pass=document.getElementById("pass");
      var show=document.getElementById("show");
      if( show.checked){
       
        pass.type="text";
      }else{
        pass.type="password";
      }
    }
  </script>

    
