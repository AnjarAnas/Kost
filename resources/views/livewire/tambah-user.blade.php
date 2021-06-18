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
          <a class="navbar-brand" href="#pablo">Table List</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar navbar-kebab"></span>
          <span class="navbar-toggler-bar navbar-kebab"></span>
          <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
          
          
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> <h3>Tambah Penghuni</h3></h4>
                    </div>
                    <div class="card-body">
                        @if (session('gagal'))
                        <div class="alert alert-danger">
                            {{session('gagal')}}
                        </div>
                            
                        @endif
                        <form wire:submit.prevent="tambah()" method="post">
                            <div class="form-group m-2">
                                <input type="text" wire:model="nama" placeholder="Masukan nama Anda" class="form-control mb-2" id="">
                                @error('nama')
                                    <span class="mb-2 ml-2 text-danger">{{$message}}</span>
                                @enderror
                                <input type="email" wire:model="email" placeholder="Masukan Email Anda" class="form-control mb-2" id="">
                                @error('email')
                                    <span class="mb-2 ml-2 text-danger">{{$message}}</span>
                                @enderror
                                <input type="password" wire:model="pass" placeholder="Masukan Password Anda" class="form-control mb-2" id="">
                                @error('pass')
                                    <span class="mb-2 ml-2 text-danger">{{$message}}</span>
                                @enderror
                                <input type="password" wire:model="pass_ver" placeholder="Masukan Password Anda" class="form-control mb-2" id="">
                                @error('pass_ver')
                                    <span class="mb-2 ml-2 text-danger">{{$message}}</span>
                                @enderror
                                <input type="number" wire:model="no" placeholder="Masukan No Handphone Anda" class="form-control mb-2" id="">
                                @error('no')
                                    <span class="mb-2 ml-2 text-danger">{{$message}}</span>
                                @enderror
                                <input type="text" wire:model="univ" placeholder="Masukan Universitas Anda" class="form-control mb-2" id="">
                                @error('univ')
                                    <span class="mb-2 ml-2 text-danger">{{$message}}</span>
                                @enderror
                                <button class="btn btn-md btn-primary col-12">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
