<nav class="navbar fixed-bottom bg-white shadow-sm pt-2 pb-1">
    <div class="container-fluid justify-content-around">
        <a href="{{ route('mahasiswa.dashboard') }}"
            class="nav-item d-flex flex-column align-items-center text-decoration-none active">
            <i class="las la-home mb-1"></i>
            <span class="small">Home</span>
        </a>
        <a class="nav-item d-flex flex-column align-items-center text-decoration-none" href="#">
            <i class="las la-calendar-alt mb-1"></i>
            <span class="small">Jadwal</span>
        </a>
        <a class="nav-item d-flex flex-column align-items-center text-decoration-none" href="#">
            <i class="las la-file-alt mb-1"></i>
            <span class="small">Laporan</span>
        </a>
        <a href="{{ route('mahasiswa.profil') }}"
            class="nav-item d-flex flex-column align-items-center text-decoration-none">
            <i class="las la-user mb-1"></i>
            <span class="small">Profil</span>
        </a>
    </div>
</nav>
