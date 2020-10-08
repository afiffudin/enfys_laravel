<!--@ extends('layouts.atlet')-->
@section('css')
@show
@section('content')
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{url('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Hallo, {{Auth::user()->name}}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      @if(Auth::user()->role_id == 1)
      <li class="treeview">
        <a href="{{url ('/dashboard') }}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      <li class="treeview">
        <i class="fa fa-building"></i> <span>Data Master Admin</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{url ('#') }}"><i class="fa fa-circle-o"></i> Buat Login Admin</a></li>
          <!-- <li><a href="{{url ('/Data-Company') }}"><i class="fa fa-circle-o"></i> Nama Company</a></li> -->
      </li>
    </ul>
    </li>
    <!-- <li class="treeview"> -->
    <!-- <a href="#"> -->
    <!-- <i class="fa fa-user-plus"></i> <span>Role user</span> -->
    <!-- <span class="pull-right-container"> -->
    <!-- <i class="fa fa-angle-left pull-right"></i> -->
    <!-- </span> -->
    <!-- </a> -->
    <!-- <ul class="treeview-menu"> -->
    <!-- <li><a href="{{url ('/Data-List-User') }}"><i class="fa fa-circle-o"></i> Daftar List User</a></li> -->
    <!-- </li> -->
    <!-- </ul> -->
    <!-- </li -->
    <!-- <li class="treeview"> -->
    <!-- <a href="#"> -->
    <!-- <i class="fa fa-users"></i> <span>Master Admin</span> -->
    <!-- <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{url ('/Data-Atlet') }}"><i class="fa fa-circle-o"></i> ATLIT</a></li>
        <li><a href="{{url ('/Data-admincabor') }}"><i class="fa fa-circle-o"></i> ADMIN CABOR</a></li>
        <li><a href="{{url('/Data-cabor')}}"><i class="fa fa-circle-o"></i> CABOR</a>
        <li><a href="{{url('/ketuakoni')}}"><i class="fa fa-circle-o"></i> Ketua Koni</a></li>
    </li>
    </ul>
    </?li> -->
    <!-- <li class="treeview"> -->
    <!-- <a href="#"> -->
    <!-- <i class="fa fa-cogs"></i> <span>Pertandingan</span> -->
    <!-- <span class="pull-right-container"> -->
    <!-- <i class="fa fa-angle-left pull-right"></i> -->
    <!-- </span> -->
    <!-- </a> -->
    <!-- <ul class="treeview-menu"> -->
    <!-- <li class="active"><a href="{{url ('/jadwal-pertandingan')}}"><i class="fa fa-calendar"></i>Buat Jadwal</a></li> -->
    <!-- --li><a href="#"><i class="fa fa-circle-o"></i> Update Status Terakhir</a></!----li>!- -->
    <!-- <li><a href="{{url('/serah-terima/create')}}"><i class="fa fa-circle-o"></i> Buat Serah Terima</a></li> -->
    <!-- </li> -->
    <!-- </ul> -->
    <!-- </li> -->
    <li class="treeview">
      <a href="#">
        <i class="fa fa-desktop"></i> <span>Monitoring</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <!-- <li class="active"><a href="{{url ('/lihat-jadwal')}}"><i class="fa fa-circle-o"></i> Lihat Jadwal CABOR/PIC</a></li> -->
        <li class="active"><a href="{{url ('/lihat-jadwal')}}"><i class="fa fa-circle-o"></i> Lihat Jadwal CABOR/PIC</a></li>
        <li><a href="{{url ('')}}"><i class="fa fa-circle-o"></i> Pertandingan</a></li>
        <li><a href="{{url ('')}}"><i class="fa fa-circle-o"></i> Kedaraan</a></li>
        <li><a href="{{url ('#')}}"><i class="fa fa-circle-o"></i> Lihat Jadwal Harian</a></li>
        <!-- <li><a href="{{url('/Data-Status')}}  "><i class="fa fa-circle-o"></i> Update Status Terakhir</a></li> -->
        <!---li class="active"><a href="#"><i class="fa fa-circle-o"></i>Emergency</a></@li>!--->
        <!-- <li><a href="{{url ('/serah-terima/read')}}"><i class="fa fa-circle-o"></i> Serah Terima/Pengambilan</a></li> -->
    </li>
    </ul>
    @elseif(Auth::user()->role_id == 2)
    <li class="treeview">
      <a href="{{url ('/dashboard') }}">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      </a>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-users"></i> <span>Master Admin</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{url ('/Data-Atlet') }}"><i class="fa fa-circle-o"></i> ATLIT</a></li>
        <li><a href="{{url ('/Data-admincabor') }}"><i class="fa fa-circle-o"></i> ADMIN CABOR</a></li>
        <li><a href="{{url('/Data-cabor')}}"><i class="fa fa-circle-o"></i> CABOR</a>
        <li><a href="{{url('/ketuakoni')}}"><i class="fa fa-circle-o"></i> Ketua Koni</a></li>
    </li>
    </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-cogs"></i> <span>Pertandingan</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="active"><a href="{{url ('/jadwal-pertandingan')}}"><i class="fa fa-calendar"></i>Buat Jadwal</a></li>
        <!----li><a href="#"><i class="fa fa-circle-o"></i> Update Status Terakhir</a></!----li>!--->
        <li><a href="{{url('/serah-terima/create')}}"><i class="fa fa-circle-o"></i> Buat Serah Terima</a></li>
    </li>
    </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-desktop"></i> <span>Monitoringg</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="active"><a href="{{url ('/lihat-jadwal')}}"><i class="fa fa-circle-o"></i> Lihat Jadwal CABOR/PIC</a></li>
        <li><a href="{{url ('')}}"><i class="fa fa-circle-o"></i> Pertandingan</a></li>
        <li><a href="{{url ('')}}"><i class="fa fa-circle-o"></i> Kedaraan</a></li>
        <li><a href="{{url ('#')}}"><i class="fa fa-circle-o"></i> Lihat Jadwal Harian</a></li>
    </li>
    </ul>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-building"></i> <span>Company</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{url ('/Data-Company') }}"><i class="fa fa-circle-o"></i> Nama Company</a></li>
    </li>
    </ul>
    </li>
    @elseif(Auth::user()->role_id == 3)
    <li class="treeview">
      <a href="#">
        <i class="fal fa-tachometer-alt"></i><span>Dashboard</span>
        <span class="pull-right-container">
          <i class="fa fa-tachometer-alt"></i>
        </span>
      </a>
      <!-- <li class="active"><a href="{{url ('#')}}"><i class="fa fa-circle-o"></i>Master</a></li> -->
      <!-- <li><a href="#"><i class="fa fa-circle-o"></i> User</a></li> -->
    </li>
    @elseif(Auth::user()->role_id == 4)
    <li class="treeview">
      <a href="#">
        <i class="fa fa-tachometer-alt"></i><span>Dashboard</span>
        <span class=" pull-right-container">
          <i class="fa fa-tachometer-alt"></i>
        </span>
      </a>
      <ul class="treview-menu">
        <li class="active"><a href="{{url('')}}"><i class="fa fa-calender"></i>Jadwal</a></li>
        <!-- <li class="active"><a href="{{url ('#')}}"><i class="fa fa-circle-o"></i>Master</a></li> -->
        <!-- <li><a href="#"><i class="fa fa-circle-o"></i> User</a></li> -->
    </li>
    </ul>
    </li>
    @elseif(Auth::user()->role_id == 5)
    <li class="treeview">
      <a href="#">
        <i class="fa fa-cogs"></i> <span>Dashboard</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="active"><a href="{{url ('#')}}"><i class="fa fa-calendar"></i>Dashboarad</a></li>
        <!----li><a href="#"><i class="fa fa-circle-o"></i> Update Status Terakhir</a></!----li>!--->
        <!---li><a href="{{url('/serah-terima/create')}}"><i class="fa fa-circle-o"></i> Buat Serah Terima</a></!---li!--->
    </li>
    </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-desktop"></i> <span>Monitoring</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="active"><a href="{{url ('/lihat-jadwal')}}"><i class="fa fa-circle-o"></i> Lihat Jadwal CABOR/PIC</a></li>
        <li><a href="{{url ('')}}"><i class="fa fa-circle-o"></i> Pertandingan</a></li>
        <li><a href="{{url ('')}}"><i class="fa fa-circle-o"></i> Kedaraan</a></li>
        <li><a href="{{url ('#')}}"><i class="fa fa-circle-o"></i> Lihat Jadwal Harian</a></li>
    </li>
    </ul>
    </li>
    @else
    </ul>
    @endif
  </section>
  <!-- /.sidebar -->
</aside>e