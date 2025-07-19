@extends('layouts.first')
@section('title')
    Profil
@endsection
@section('content')
    <div class="profile-header px-3 py-3">
        <h1 class="fs-4 fw-bold mb-0">Profil Saya</h1>
    </div>

    <div class="profile-content px-3 pt-4">
        <div class="profile-card text-center mb-4">
            <img src="@if (Auth::user()->avatar != '') {{ asset('storage/' . Auth::user()->avatar) }}@else{{ URL::asset('build/dist/img/user2-160x160.jpg') }} @endif"
                alt="User Image" class="profile-pic-lg rounded-circle mb-3 border border-3 border-secondary">
            <h2 class="fs-5 fw-semibold text-dark mb-0">{{ session('nama_mahasiswa') }}</h2>
            <p class="text-muted mb-0">Mahasiswa</p>
        </div>

        <div class="profile-details mb-4">
            <div class="profile-details-item d-flex align-items-center py-2">
                <i class="las la-phone me-3 text-muted"></i>
                <div>
                    <small class="text-muted d-block">NIM</small>
                    <p class="mb-0 fw-medium text-dark">{{ session('npm') }}</p>
                </div>
            </div>
            <div class="profile-details-item d-flex align-items-center py-2">
                <i class="las la-graduation-cap me-3 text-muted"></i>
                <div>
                    <small class="text-muted d-block">Program Studi</small>
                    <p class="mb-0 fw-medium text-dark">Teknik Informatika</p>
                </div>
            </div>
            <div class="profile-details-item d-flex align-items-center py-2">
                <i class="las la-envelope me-3 text-muted"></i>
                <div>
                    <small class="text-muted d-block">Email</small>
                    <p class="mb-0 fw-medium text-dark">{{ session('email') }}</p>
                </div>
            </div>
            <div class="profile-details-item d-flex align-items-center py-2">
                <i class="las la-mobile-alt me-3 text-muted"></i>
                <div>
                    <small class="text-muted d-block">Nomor Telepon</small>
                    <p class="mb-0 fw-medium text-dark">{{ session('telepon') }}</p>
                </div>
            </div>
        </div>

        <div class="profile-action-list mb-5">
            {{-- <a href="#"
                class="profile-action-item d-flex justify-content-between align-items-center text-decoration-none text-dark py-3">
                <div class="d-flex align-items-center">
                    <i class="las la-lock me-3"></i>
                    <span>Ubah Password</span>
                </div>
                <i class="las la-angle-right text-muted"></i>
            </a>
            <a href="#"
                class="profile-action-item d-flex justify-content-between align-items-center text-decoration-none text-dark py-3">
                <div class="d-flex align-items-center">
                    <i class="las la-bell me-3"></i>
                    <span>Notifikasi</span>
                </div>
                <i class="las la-angle-right text-muted"></i>
            </a>
            <a href="#"
                class="profile-action-item d-flex justify-content-between align-items-center text-decoration-none text-dark py-3">
                <div class="d-flex align-items-center">
                    <i class="las la-question-circle me-3"></i>
                    <span>Bantuan</span>
                </div>
                <i class="las la-angle-right text-muted"></i>
            </a> --}}
            <a href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="profile-action-item d-flex justify-content-between align-items-center text-decoration-none text-danger py-3">
                <div class="d-flex align-items-center">
                    <i class="las la-sign-out-alt me-3"></i>
                    <span>Keluar</span>
                </div>
                <i class="las la-angle-right text-muted"></i>
            </a>
            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
@endsection
