@extends('layouts.first')
@section('title')
    Beranda
@endsection
@section('content')
    <div class="dashboard-header text-white px-3 pb-4">
        <h1 class="fs-5 mt-3 mb-4">Dashboard Mahasiswa</h1>
        <div class="user-info d-flex align-items-center">
            <img src="@if (Auth::user()->avatar != '') {{ asset('storage/' . Auth::user()->avatar) }}@else{{ URL::asset('build/dist/img/user2-160x160.jpg') }} @endif"
                alt="User Image" class="profile-pic me-3 rounded-circle border border-3 border-white">
            <div>
                <h2 class="fs-6 mb-0">{{ session('nama_mahasiswa') }}</h2>
                <p class="mb-0 lh-sm">Teknik Informatika</p>
                <p class="mb-0 lh-sm">NIM: {{ session('nama_mahasiswa') }}</p>
            </div>
        </div>
    </div>

    <div class="dashboard-content px-3 pt-4">
        <div class="row row-cols-2 g-3 mb-5">
            <div class="col">
                <div class="card h-100 text-center p-2 shadow-sm border-0">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <i class="las la-calendar-alt icon mb-2"></i>
                        <p class="card-text fw-medium text-dark mb-0">Jadwal Bimbingan</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 text-center p-2 shadow-sm border-0">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <i class="las la-cloud-upload-alt icon mb-2"></i>
                        <p class="card-text fw-medium text-dark mb-0">Upload Laporan</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 text-center p-2 shadow-sm border-0">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <i class="las la-file-alt icon mb-2"></i>
                        <p class="card-text fw-medium text-dark mb-0">Hasil Revisi</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 text-center p-2 shadow-sm border-0">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <i class="las la-user icon mb-2"></i>
                        <p class="card-text fw-medium text-dark mb-0">Profil</p>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="section-title fs-6 fw-semibold mb-3">Bimbingan Terakhir</h3>
        <div class="card last-guidance-card p-3 mb-4 shadow-sm border-0">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="text-muted small">20 Januari 2024</span>
                <span
                    class="badge text-success-emphasis bg-success-subtle rounded-pill fw-semibold py-2 px-3">Selesai</span>
            </div>
            <p class="fw-semibold mb-1 text-dark">Bimbingan BAB III - Metodologi Penelitian</p>
            <p class="text-muted small mb-0">Pembimbing: Dr. Ahmad Suryadi, M.Kom</p>
        </div>

        <h3 class="section-title fs-6 fw-semibold mb-3">Pengumuman</h3>
        <div class="card announcement-card p-3 mb-5 shadow-sm border-0">
            <p class="text-danger fw-bold mb-2">Penting!</p>
            <p class="text-dark mb-0">Batas waktu pengumpulan revisi BAB III adalah 25 Januari 2024</p>
        </div>
    </div>
@endsection
