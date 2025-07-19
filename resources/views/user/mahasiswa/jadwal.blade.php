@extends('layouts.first')
@section('title')
    Beranda
@endsection
@section('content')
    <div class="jadwal-header d-flex flex-column justify-content-center align-items-center px-3 py-3">
        <h1 class="fs-5 fw-bold mb-0 flex-grow-1 text-center">Daftar Jadwal Bimbingan</h1>
        <div style="width: 2.5rem;"></div>
    </div>

    <div class="jadwal-content px-3 pt-4">
        @forelse ($jadwals as $jadwal)
            <div class="card jadwal-bimbingan-item p-3 mb-3 shadow-sm border-0">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="d-flex align-items-center">
                        <i class="las la-clock me-2 text-muted"></i>
                        <span
                            class="fw-semibold text-dark">{{ \Carbon\Carbon::parse($jadwal->tanggal_bimbingan)->locale('id')->translatedFormat('d F Y') }}</span>
                    </div>
                    @if ($jadwal->status == 'dijadwalkan')
                        <span
                            class="badge text-warning-emphasis bg-warning-subtle rounded-pill fw-semibold py-2 px-3">dijadwalkan</span>
                    @elseif ($jadwal->status == 'selesai')
                        <span
                            class="badge text-success-emphasis bg-success-subtle rounded-pill fw-semibold py-2 px-3">selesai</span>
                    @elseif ($jadwal->status == 'batal')
                        <span
                            class="badge text-danger-emphasis bg-danger-subtle rounded-pill fw-semibold py-2 px-3">batal</span>
                    @endif
                </div>
                <p class="time text-muted small mb-1">{{ $jadwal->waktu_mulai }} - {{ $jadwal->waktu_selesai }}</p>
                <div class="d-flex align-items-center mb-1">
                    <i class="las la-graduation-cap me-2 text-muted"></i>
                    <p class="mb-0 text-dark">{{ $jadwal->pembimbing->nama_dosen }}</p>
                </div>
                <div class="d-flex align-items-center">
                    <i class="las la-microphone me-2 text-muted"></i>
                    <p class="mb-0 text-dark">{{ $jadwal->topik_bimbingan }}</p>
                </div>
                <div class="d-flex align-items-center">
                    <i class="las la-map-marker-alt me-2 text-muted"></i>
                    <p class="mb-0 text-dark">{{ $jadwal->tempat }}</p>
                </div>
            </div>
        @empty
            <div class="alert alert-info" role="alert">
                Jadwal bimbingan belum tersedia.
            </div>
        @endforelse
    </div>
@endsection
