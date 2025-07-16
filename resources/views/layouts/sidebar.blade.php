<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="@if (Auth::user()->avatar != '') {{ asset('storage/' . Auth::user()->avatar) }}@else{{ URL::asset('build/dist/img/user2-160x160.jpg') }} @endif"
                    class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        {{-- <hr> --}}
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="main-utama">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i><span>Dashboard</span>
                </a>
            </li>
            <li class="header">MAIN NAVIGATION</li>
            <li
                class="treeview {{ Request::is('panel/dosen*', 'panel/mahasiswa*', 'panel/judul*') ? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-cubes"></i>
                    <span>Master Data</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('panel/dosen*') ? 'active' : '' }}"><a
                            href="{{ route('dosen.index') }}"><i class="fa fa-circle-o"></i> Data Dosen</a></li>
                    <li class="{{ Request::is('panel/mahasiswa*') ? 'active' : '' }}"><a
                            href="{{ route('mahasiswa.index') }}"><i class="fa fa-circle-o"></i> Data Mahasiswa</a></li>
                    <li class="{{ Request::is('panel/judul*') ? 'active' : '' }}"><a
                            href="{{ route('judul.index') }}"><i class="fa fa-circle-o"></i> Judul Skripsi</a></li>
                </ul>
            </li>
            <li class="{{ Request::is('panel/jadwal*') ? 'active' : '' }}">
                <a href="{{ route('jadwal.index') }}"><i class="fa fa-calendar"></i><span>Jadwal
                        Bimbingan</span></a>
            </li>
            <li class="{{ Request::is('panel/*') ? 'active' : '' }}">
                <a href=""><i class="fa fa-area-chart"></i><span>Monitoring
                        Bimbingan</span></a>
            </li>
            <li class="{{ Request::is('panel/*') ? 'active' : '' }}">
                <a href=""><i class="fa fa-print"></i><span>Laporan</span></a>
            </li>
            <li class="header">More</li>
            <li class="treeview {{ Request::is('panel/users*', 'panel/aplikasi*') ? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-gears"></i> <span>Pengaturan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('panel/users*') ? 'active' : '' }}"><a
                            href="{{ route('users.index') }}"><i class="fa fa-circle-o"></i> Akun Pengguna</a></li>
                    <li class="{{ Request::is('panel/aplikasi*') ? 'active' : '' }}"><a
                            href="{{ route('aplikasi.index') }}"><i class="fa fa-circle-o"></i> Aplikasi</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void();"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                        class="fa fa-power-off"></i><span>Keluar</span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
