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
        <p>Hallo, {{Session::get('name')}}. Apakabar?</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>MASTER ADMIN</span>
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
        <li><a href="#"><i class="fa fa-circle-o"></i> Update Status Terakhir</a></li>
        <li><a href="{{url('/serah-terima/read')}}"><i class="fa fa-circle-o"></i> Buat Serah Terima</a></li>
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
        <li><a href="#"><i class="fa fa-circle-o"></i> Update Status Terakhir</a></li>
        <li class="active"><a href="#"><i class="fa fa-circle-o"></i>Emergency</a></li>
        <li><a href="index2.html"><i class="fa fa-circle-o"></i> Serah Terima/Pengambilan</a></li>
    </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>