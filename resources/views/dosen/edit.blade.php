@extends('layouts.master')
@section('title')
    Ubah Data Dosen
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
            Data Dosen
        @endslot
        @slot('title')
            Ubah Data Dosen
        @endslot
    @endcomponent

    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Form Input</h3>
                <div class="pull-right box-tools">
                    <a href="{{ route('dosen.index') }}" class="btn btn-social btn-sm btn-default">
                        <i class="fa fa-reply"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="box-body">
                <form class="form-horizontal" action="{{ route('dosen.update', $dosen->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="nidn" class="col-sm-2 control-label">NIDN <span class="text-red">*</span></label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nidn') is-invalid @enderror" id="nidn"
                                name="nidn" value="{{ old('nidn', $dosen->nidn) }}" placeholder="NIDN Dosen">
                            @error('nidn')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_dosen" class="col-sm-2 control-label">Nama Dosen <span
                                class="text-red">*</span></label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nama_dosen') is-invalid @enderror"
                                id="nama_dosen" name="nama_dosen" value="{{ old('nama_dosen', $dosen->nama_dosen) }}"
                                placeholder="Nama Dosen">
                            @error('nama_dosen')
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
                                <option value="Laki-Laki" @if (old('jenis_kelamin', $dosen->jenis_kelamin) == 'Laki-Laki') selected="selected" @endif>
                                    Laki-Laki
                                </option>
                                <option value="Perempuan" @if (old('jenis_kelamin', $dosen->jenis_kelamin) == 'Perempuan') selected="selected" @endif>
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
                        <label for="alamat_dosen" class="col-sm-2 control-label">Alamat <span
                                class="text-red">*</span></label>

                        <div class="col-sm-10">
                            <textarea class="form-control @error('alamat_dosen') is-invalid @enderror" rows="3" name="alamat_dosen"
                                id="alamat_dosen">{{ old('alamat_dosen', $dosen->alamat_dosen) }}</textarea>
                            @error('alamat_dosen')
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
                                name="email" value="{{ old('email', $dosen->email) }}" placeholder="Email Aktif">
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
                                name="telepon" value="{{ old('telepon', $dosen->telepon) }}"
                                placeholder="Nomor Telepon Aktif">
                            @error('telepon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pendidikan_terakhir" class="col-sm-2 control-label">Pendidikan Terakhir <span
                                class="text-red">*</span></label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('pendidikan_terakhir') is-invalid @enderror"
                                id="pendidikan_terakhir" name="pendidikan_terakhir"
                                value="{{ old('pendidikan_terakhir', $dosen->pendidikan_terakhir) }}"
                                placeholder="Pendidikan Terakhir">
                            @error('pendidikan_terakhir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bidang_ilmu" class="col-sm-2 control-label">Bidang Ilmu <span
                                class="text-red">*</span></label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('bidang_ilmu') is-invalid @enderror"
                                id="bidang_ilmu" name="bidang_ilmu"
                                value="{{ old('bidang_ilmu', $dosen->bidang_ilmu) }}" placeholder="Bidang Keilmuan">
                            @error('bidang_ilmu')
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
