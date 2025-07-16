@extends('layouts.master')
@section('title')
    Tambah Data Mahasiswa
@endsection
@push('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ URL::asset('build/bower_components/select2/dist/css/select2.min.css') }}">
@endpush
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Master Data
        @endslot
        @slot('li_2')
            Data Mahasiswa
        @endslot
        @slot('title')
            Tambah Data Mahasiswa
        @endslot
    @endcomponent

    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Form Input</h3>
                <div class="pull-right box-tools">
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-social btn-sm btn-default">
                        <i class="fa fa-reply"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="box-body">
                <form class="form-horizontal" action="{{ route('mahasiswa.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="npm" class="col-sm-2 control-label">NPM <span class="text-red">*</span></label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('npm') is-invalid @enderror" id="npm"
                                name="npm" value="{{ old('npm') }}" placeholder="NPM Mahasiswa">
                            @error('npm')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_mahasiswa" class="col-sm-2 control-label">Nama Mahasiswa <span
                                class="text-red">*</span></label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nama_mahasiswa') is-invalid @enderror"
                                id="nama_mahasiswa" name="nama_mahasiswa" value="{{ old('nama_mahasiswa') }}"
                                placeholder="Nama Mahasiswa">
                            @error('nama_mahasiswa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin" class="col-sm-2 control-label">Jenis Kelamin <span
                                class="text-red">*</span></label>

                        <div class="col-sm-10">
                            <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin"
                                name="jenis_kelamin">
                                <option value="" hidden>-- Choose --</option>
                                <option value="Laki-Laki" @if (old('jenis_kelamin') == 'Laki-Laki') selected="selected" @endif>
                                    Laki-Laki
                                </option>
                                <option value="Perempuan" @if (old('jenis_kelamin') == 'Perempuan') selected="selected" @endif>
                                    Perempuan
                                </option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat_mahasiswa" class="col-sm-2 control-label">Alamat <span
                                class="text-red">*</span></label>

                        <div class="col-sm-10">
                            <textarea class="form-control @error('alamat_mahasiswa') is-invalid @enderror" rows="3" name="alamat_mahasiswa"
                                id="alamat_mahasiswa">{{ old('alamat_mahasiswa') }}</textarea>
                            @error('alamat_mahasiswa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email <span class="text-red">*</span></label>

                        <div class="col-sm-10">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" placeholder="Email Aktif">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telepon" class="col-sm-2 control-label">Nomor Telepon <span
                                class="text-red">*</span></label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon"
                                name="telepon" value="{{ old('telepon') }}" placeholder="Nomor Telepon Aktif">
                            @error('telepon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kelas" class="col-sm-2 control-label">Kelas <span class="text-red">*</span></label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('kelas') is-invalid @enderror" id="kelas"
                                name="kelas" value="{{ old('kelas') }}" placeholder="Kelas">
                            @error('kelas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="angkatan" class="col-sm-2 control-label">Angkatan <span
                                class="text-red">*</span></label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('angkatan') is-invalid @enderror"
                                id="angkatan" name="angkatan" value="{{ old('angkatan') }}" placeholder="Angkatan">
                            @error('angkatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10 text-right">
                            <button type="submit" class="btn btn-social btn-info btn-sm"><i class="fa fa-save"></i>
                                Simpan</button>
                        </div>
                    </div>
                    <p>Catatan : (<span class="text-red">*</span>) Wajib diisi.</p>
                </form>
            </div>
        </div>
    </section>
@endsection
