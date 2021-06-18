<div class="main-panel" id="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
      <div class="container-fluid">
        <div class="navbar-wrapper">
          <div class="navbar-toggle">
            <button type="button" class="navbar-toggler">
              <span class="navbar-toggler-bar bar1"></span>
              <span class="navbar-toggler-bar bar2"></span>
              <span class="navbar-toggler-bar bar3"></span>
            </button>
          </div>
          <a class="navbar-brand" href="#pablo">Input Tagihan</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar navbar-kebab"></span>
          <span class="navbar-toggler-bar navbar-kebab"></span>
          <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content ">
      <div class="row d-flex justify-content-center">
        <div class="col-md-8 ">
          <div class="card ">
            <div class="card-header">
              <h5 class="title">Masukan Tagihan</h5>
            </div>
            @if(session('ada'))
            <div class="alert alert-danger m-4">
              {{session('ada')}}
            </div>
            @endif
            <div class="card-body">
              
              
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group d-flex justify-content-center">
                      <button class="btn btn-primary btn-md col-5" wire:click="input()">Input Tagihan</button>
                    </div>
                  </div>
                </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
