
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
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"> Simple Table</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <th>Id Bayar</th>
                  <th>Bulan</th>
                  <th>Jumlah Bayar</th>
                  <th>Tanggal Bayar</th>
                  <th>Status</th>
                  <th>Deadline</th>
                  <th>Aksi</th>
                  @foreach($bayar as $bayars)
                  <tr>
                      <td>
                          {{$bayars->id_bayar}}
                      </td>
                      <td>
                          {{$bayars->bulan}}
                      </td>
                      <td>
                          {{$bayars->jlh_bayar}}
                      </td>
                      <td>
                          {{$bayars->tanggal_bayar}}
                      </td>
                      
                        @if($bayars->status=="settlement")
                        <td><div class="text-success">
                          Sudah Dibayar
                          </div></td>
                          <td>-------</td>
                          <td><a href="/bayar/{{$bayars->id_bayar}}"  class="btn btn-md btn-success">Struk</a></td>
                        @elseif ($bayars->status=="Dalam Proses")
                        <td><div class="text-warning">
                          Dalam Proses
                          </div></td>
                          <td>-------</td>
                        <td><a href="/bayar/{{$bayars->id_bayar}}"  class="btn btn-md btn-warning">Status</a></td>
                        @else
                          <td><div class="text-danger">
                          {{$bayars->status}}
                          </div></td>
                          <td>{{date('d M Y',strtotime($bayars->deadline))}}</td>
                          <td><a href="/bayar/{{$bayars->id_bayar}}"  class="btn btn-md btn-danger">Bayar</a></td>
                        @endif
                      
                      
                      
                  </tr>
                  @endforeach
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
