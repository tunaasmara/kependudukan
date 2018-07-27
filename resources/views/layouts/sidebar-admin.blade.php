<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{$user->name}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Admin Menu</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="#"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-folder"></i> <span>Users</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('users.index')}}">Data Users</a></li>
            <li><a href="{{route('suratData')}}">Data Roles</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-folder"></i> <span>Permohonan Surat</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('suratInput')}}">Input Permohonan Surat</a></li>
            <li><a href="{{route('suratData')}}">Data Permohonan Surat</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-users"></i> <span>Identitas Penduduk</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('pendudukKtp')}}">KTP</a></li>
            <li><a href="{{route('pendudukSku')}}">Surat Keterangan Usaha</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-book"></i> <span>Kartu Keluarga</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('kkInput')}}">Input KK</a></li>
            <li><a href="{{route('kkData')}}">Data KK</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>