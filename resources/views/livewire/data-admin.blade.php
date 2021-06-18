<div>
    @if($kondisi=='tahun')
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
              <a class="navbar-brand" href="/info">Data Penghuni Kost</a>
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
            @foreach($tahun as $tahuns)
              <div class="card">
                <div class="row m-2">
                  <div class="col-md-5">
                      <h4>{{$tahuns->tahun}}</h4>
                    </div>
                    <div class="col-md-7 text-right mt-2">
                        <button wire:click="index('{{$tahuns->id_tahun}}')" class="btn btn-primary btn-md" >Detail</button>
                    </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    @elseif ($kondisi=='bulan')
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
              <a class="navbar-brand" href="#pablo">Data Penghuni Kost</a>
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
            @foreach($bulan as $bulans)
              <div class="card">
                <div class="row m-2">
                  <div class="col-md-5">
                      <h4>{{$bulans->bulan}}</h4>
                  </div>
                    <div class="col-md-7 text-right mt-2">
                        <button wire:click="detail('{{$bulans->id_bulan}}')" class="btn btn-primary btn-md" >Detail</button>
                    </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    @else
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
              <a class="navbar-brand" href="#pablo">Detail Data</a>
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
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title"> Detai Tagihan</h4>
                </div>
                @if(session('sukses'))
                  <div class="m-3 alert alert-success">
                    {{session('sukses')}}
                  </div>
                @endif
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                    <th>Nama</th>
                      <th>Id Bayar</th>
                      <th>Bulan</th>
                      <th>Jumlah Bayar</th>
                      <th>Tanggal Bayar</th>
                      <th>Status</th>
                      <th>Dibuat Pada</th>
                      <th>Deadline Bayar</th>
                      <th>Aksi</th>
                      @foreach($bayar as $bayars)
                      
                      <tr>
                          <td>@php 
                               foreach($nama as $a){
                                   if ($bayars->id_user==$a->id_user){
                                       echo $a->nama;
                                   }
                               }
  
                              @endphp
                          </td>
                          <td>
                              {{$bayars->id_bayar}}
                          </td>
                          <td>
                              {{$bayars->bulan}}
                          </td>
                          <td>
                              Rp @convert($bayars->jlh_bayar)
                          </td>
                          <td>
                          @php
                               if($bayars->tanggal_bayar==null){
  
                               }else{
                                 $date=date('d M Y',strtotime($bayars->tanggal_bayar));
                                 echo $date;
                               }
                          @endphp
                              
                          </td>
                          <td>
                          @if($bayars->status=="settlement")
                              <div class="text-success">
                              Sudah Dibayar
                              </div>
                          @else
                              <div class="text-danger">
                              {{$bayars->status}}
                              </div>
                          @endif
                          </td>
                          <td>
                               @php
                               $date1=date('d M Y',strtotime($bayars->awal));
                               echo $date1;
                                
                               @endphp
                          </td>
                          <td>
                              <?php
                              if($bayars->status=="settlement"){
                                echo "---------";
                              }
                              else{
                                
                                // $date1=date('d M Y',strtotime($bayars->deadline));
                                // echo $date1;
                                $date=date('m/d/Y',strtotime($bayars->deadline));
                                  $datenow=date('m/d/Y');
                                  
                                  $datecrea=date_create($date);
                                  $datecrea1=date_create($datenow);
                                  
                                  $selish=date_diff($datecrea1,$datecrea);
                                  $data=$selish->days;
                                  $date=date('d M Y',strtotime($bayars->deadline));
                                  if($data>20){
                                    ?>
                                    <div class="text-success">
                                      {{$date}}
                                    </div>
                                    <?php
                                  }elseif($data>10){
                                    ?>
                                    <div class="text-warning">
                                    {{$date}}
                                    </div>
                                    <?php
                                  }
                                  else{
                                    ?>
                                    <div class="text-danger">
                                    {{$date}}
                                    </div>
                                    <?php
                                  }
                              }  
                              ?>
                              
                          </td>
                          <td>
                          
                          @if ($bayars->status=="settlement")
                          <button wire:click="konfirmasi('{{$bayars->id_bayar}}')" class="btn btn-md btn-danger">Kofirmasi</button>
                            @else
                            <button wire:click="reminder('{{$bayars->id_bayar}}')" class="btn btn-md btn-primary">Reminder</button>
                            
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
    @endif
</div>
