<div>
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
                        <div class="card p-3">
                        <h4>Daftar User</h4>
                        <div class="table-responsive">
                            <table class="table">
                            <th>ID User</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Masuk Pada</th>
                            @foreach($keluar as $keluars)
                            
                                <tr>
                                <td>
                                    {{$keluars->id_user}}
                                </td>
                                <td>
                                    {{$keluars->nama}}
                                </td>
                                <td>
                                <?php $date2=date('d M Y',strtotime($keluars->masuk)); echo $date2?>
                                </td>
                                <td>
                                    <?php $date2=date('d M Y',strtotime($keluars->keluar)); echo $date2?>
                                </td>
                                </tr>
                                
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
