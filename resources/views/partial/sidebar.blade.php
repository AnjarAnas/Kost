<div class="sidebar" data-color="orange">
    <div class="logo">
      <a href="http://www.creative-tim.com" class="simple-text logo-mini">
        Hey
      </a>
      <a href="http://www.creative-tim.com" class="simple-text logo-normal">
        @if (Auth::user()->role==1)
          Admin
        @else
          {{Auth::user()->name}}
        @endif
      </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
      @if (Auth::user()->role==1)
        <ul class="nav">
          <li class="{{Request::path()==='dashboard'?'active':''}}">
            <a href="/dashboard">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="{{Request::path()==='data'?'active':''}}">
            <a href="/data">
              <i class="now-ui-icons shopping_bag-16"></i>
              <p>Data</p>
            </a>
          </li>
          <li class="{{Request::path()==='userkeluar'?'active':''}}">
            <a href="/userkeluar">
              <i class="now-ui-icons ui-1_simple-add"></i>
              <p>User Keluar</p>
            </a>
          </li>
          <li class="{{Request::path()==='input'?'active':''}}">
            <a href="/input">
              <i class="now-ui-icons ui-1_simple-add"></i>
              <p>Input Tagihan</p>
            </a>
          </li>
          <li class="{{Request::path()==='tambahuser'?'active':''}}">
            <a href="/tambahuser">
              <i class="now-ui-icons ui-1_simple-add"></i>
              <p>Tambah User</p>
            </a>
          </li>
          @livewire('logout')
        </ul>
      @else
      <ul class="nav">
        <li class="{{Request::path()==='home' || Request::is("bayar/*")?'active':''}}">
          <a href="/home">
            <i class="now-ui-icons design_app"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="{{Request::path()==='data'?'active':''}}">
          <a href="/datauser">
            <i class="now-ui-icons shopping_bag-16"></i>
            <p>Data</p>
          </a>
        </li>
       
        @livewire('logout')
      </ul>
      @endif
      
    </div>
  </div>