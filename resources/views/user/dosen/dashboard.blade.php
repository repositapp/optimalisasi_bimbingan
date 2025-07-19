@extends('layouts.first')
@section('title')
    Beranda
@endsection
@section('content')
    <div class="dosen-dashboard-header text-white pt-4 pb-5 px-3 position-relative">
        <h1 class="fs-4 fw-bold mb-4">Dashboard Dosen</h1>
        <div class="dosen-user-info bg-white rounded-4 shadow-sm p-3 d-flex align-items-center">
            <img src="https://via.placeholder.com/60/ccc/fff?text=DSN" alt="Dr. Ahmad Suryadi"
                class="profile-pic me-3 rounded-circle border border-3 border-secondary">
            <div>
                <h2 class="fs-5 fw-semibold text-dark mb-0">Dr. Ahmad Suryadi, M.Kom</h2>
                <p class="text-muted mb-0 lh-sm">Dosen Pembimbing</p>
                <p class="text-muted mb-0 lh-sm">NIP: 198501012010121001</p>
            </div>
        </div>
    </div>

    <div class="dosen-dashboard-content px-3 pt-5">
        <div class="row row-cols-2 g-3 mb-4">
            <div class="col">
                <div class="card h-100 text-center p-3 shadow-sm border-0">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <i class="las la-calendar-alt icon mb-2"></i>
                        <p class="card-text fw-medium text-dark mb-0">Jadwal Bimbingan</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 text-center p-3 shadow-sm border-0">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <i class="las la-file-invoice icon mb-2"></i>
                        <p class="card-text fw-medium text-dark mb-0">Review Laporan</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 text-center p-3 shadow-sm border-0">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <i class="las la-history icon mb-2"></i>
                        <p class="card-text fw-medium text-dark mb-0">Riwayat Bimbingan</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 text-center p-3 shadow-sm border-0">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <i class="las la-user icon mb-2"></i>
                        <p class="card-text fw-medium text-dark mb-0">Profil</p>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="section-title fs-5 fw-semibold mb-3">Mahasiswa Bimbingan</h3>
        <div class="mb-4">
            <div class="card mahasiswa-bimbingan-card p-3 mb-3 shadow-sm border-0">
                <div class="d-flex align-items-center">
                    <img src="https://via.placeholder.com/50/f0f/fff?text=SP" alt="Sarah Putri"
                        class="rounded-circle me-3 profile-pic-sm">
                    <div>
                        <p class="fw-semibold mb-0 text-dark">Sarah Putri</p>
                        <small class="text-muted">NIM: 1234567890</small><br>
                        <small class="text-primary fw-medium">Progress: BAB III</small>
                    </div>
                </div>
            </div>
            <div class="card mahasiswa-bimbingan-card p-3 shadow-sm border-0">
                <div class="d-flex align-items-center">
                    <img src="https://via.placeholder.com/50/0ff/fff?text=BS" alt="Budi Santoso"
                        class="rounded-circle me-3 profile-pic-sm">
                    <div>
                        <p class="fw-semibold mb-0 text-dark">Budi Santoso</p>
                        <small class="text-muted">NIM: 1234567891</small><br>
                        <small class="text-primary fw-medium">Progress: BAB II</small>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="section-title fs-5 fw-semibold mb-3">Jadwal Hari Ini</h3>
        <div class="card jadwal-hari-ini-card p-3 mb-5 shadow-sm border-0">
            <div class="d-flex align-items-center mb-3">
                <i class="las la-calendar-alt me-2 text-muted"></i>
                <p class="mb-0 fw-semibold text-dark">Senin, 22 Januari 2024</p>
            </div>
            <div class="row g-2">
                <div class="col-3 text-center">
                    <p class="small text-muted mb-0">09:00</p>
                </div>
                <div class="col-9">
                    <div class="jadwal-item p-2 rounded-3">
                        <p class="fw-semibold mb-0 text-dark">Sarah Putri</p>
                        <small class="text-muted">Bimbingan BAB III</small>
                    </div>
                </div>
                <div class="col-3 text-center">
                    <p class="small text-muted mb-0">13:00</p>
                </div>
                <div class="col-9">
                    <div class="jadwal-item p-2 rounded-3">
                        <p class="fw-semibold mb-0 text-dark">Budi Santoso</p>
                        <small class="text-muted">Bimbingan BAB II</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
