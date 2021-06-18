
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
          <a class="navbar-brand" href="#pablo">Dashboard</a>
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
    <div class="content">
      <div class="row">
        @foreach($bulan as $key=>$bulans)
        
          <!-- small box -->
          <?php 
            $kosong=\App\Models\Pendapatan::where('id_bulan','=',$bulans->id_bulan)->get();
            
          ?>
          @if($kosong->isEmpty())
          
          @else
          <div class="col-lg-3 col-6 p-2">
          <div class="card">
            <div class="card-header">
              <p class="font-weight-bold">{{$bulans->bulan}}</p>
            </div>
            <div class="inner m-2">
                <?php
                  $dapat=\App\Models\Pendapatan::where('id_bulan','=',$bulans->id_bulan)->sum('jumlah');
                ?>
                @if ($dapat==0)
                @else
                <h3>Rp @convert($dapat)</h3>
                @endif
              
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
          </div>
        </div>
          @endif
          
        
        @endforeach
      </div>
      <hr>
      <div class="row">
        <div class="card p-3">
        @if(session('sukses'))
          <div class="alert alert-success m-2">
            {{session('sukses')}}
          </div>
        @endif
        <h4>Daftar User</h4>
          <div class="table-responsive">
            <table class="table">
            <th>ID User</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Masuk Pada</th>
            <th>Pindah</th>
              @foreach($user as $users)
              @if($users->role==2)
                <tr>
                  <td>
                    {{$users->id_user}}
                  </td>
                  <td>
                    {{$users->name}}
                  </td>
                  <td>
                    {{$users->email}}
                  </td>
                  <td>
                    <?php $date2=date('d M Y',strtotime($users->updated_at)); echo $date2?>
                  </td>
                  <td>
                    <a href="/pindah/{{$users->id_user}}" class="btn btn-danger btn-sm">Pindah</a>
                  </td>
                </tr>
                @endif
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>



