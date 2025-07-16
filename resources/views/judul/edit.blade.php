@extends('layouts.master')
@section('title')
    Ubah Judul Skripsi
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
            Judul Skripsi
        @endslot
        @slot('title')
            Ubah Judul Skripsi
        @endslot
    @endcomponent

    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Form Input</h3>
                <div class="pull-right box-tools">
                    <a href="{{ route('judul.index') }}" class="btn btn-social btn-sm btn-default">
                        <i class="fa fa-reply"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="box-body">
                <form class="form-horizontal" action="{{ route('judul.update', $judul->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="judul" class="col-sm-2 control-label">Judul <span class="text-red">*</span></label>

                        <div class="col-sm-10">
                            <textarea class="form-control @error('judul') is-invalid @enderror" rows="3" name="judul" id="judul">{{ old('judul', $judul->judul) }}</textarea>
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mahasiswa_id" class="col-sm-2 control-label">Mahasiswa <span
                                class="text-red">*</span></label>

                        <div class="col-sm-10">
                            <select class="form-control select2 @error('mahasiswa_id') is-invalid @enderror"
                                id="mahasiswa_id" name="mahasiswa_id">
                                <option value="" hidden>-- Choose --</option>
                                @foreach ($mahasiswa as $row)
                                    <option value="{{ $row->id }}"
                                        @if (old('mahasiswa_id', $judul->mahasiswa_id) == $row->id) selected="selected" @endif>
                                        {{ $row->nama_mahasiswa }}
                                    </option>
                                @endforeach
                            </select>
                            @error('mahasiswa_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pembimbing1_id" class="col-sm-2 control-label">Pembimbing 1 <span
                                class="text-red">*</span></label>

                        <div class="col-sm-10">
                            <select class="form-control select2 @error('pembimbing1_id') is-invalid @enderror"
                                id="pembimbing1_id" name="pembimbing1_id">
                                <option value="" hidden>-- Choose --</option>
                                @foreach ($dosen as $row)
                                    <option value="{{ $row->id }}"
                                        @if (old('pembimbing1_id', $judul->pembimbing1_id) == $row->id) selected="selected" @endif>
                                        {{ $row->nama_dosen }}
                                    </option>
                                @endforeach
                            </select>
                            @error('pembimbing1_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pembimbing2_id" class="col-sm-2 control-label">Pembimbing 2 <span
                                class="text-red">*</span></label>

                        <div class="col-sm-10">
                            <select class="form-control select2 @error('pembimbing2_id') is-invalid @enderror"
                                id="pembimbing2_id" name="pembimbing2_id">
                                <option value="" hidden>-- Choose --</option>
                                @foreach ($dosen as $row)
                                    <option value="{{ $row->id }}"
                                        @if (old('pembimbing2_id', $judul->pembimbing2_id) == $row->id) selected="selected" @endif>
                                        {{ $row->nama_dosen }}
                                    </option>
                                @endforeach
                            </select>
                            @error('pembimbing2_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="penguji1_id" class="col-sm-2 control-label">Penguji 1</label>

                        <div class="col-sm-10">
                            <select class="form-control select2 @error('penguji1_id') is-invalid @enderror" id="penguji1_id"
                                name="penguji1_id">
                                <option value="" hidden>-- Choose --</option>
                                @foreach ($dosen as $row)
                                    <option value="{{ $row->id }}"
                                        @if (old('penguji1_id', $judul->penguji1_id) == $row->id) selected="selected" @endif>
                                        {{ $row->nama_dosen }}
                                    </option>
                                @endforeach
                            </select>
                            @error('penguji1_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="penguji2_id" class="col-sm-2 control-label">Penguji 2</label>

                        <div class="col-sm-10">
                            <select class="form-control select2 @error('penguji2_id') is-invalid @enderror" id="penguji2_id"
                                name="penguji2_id">
                                <option value="" hidden>-- Choose --</option>
                                @foreach ($dosen as $row)
                                    <option value="{{ $row->id }}"
                                        @if (old('penguji2_id', $judul->penguji2_id) == $row->id) selected="selected" @endif>
                                        {{ $row->nama_dosen }}
                                    </option>
                                @endforeach
                            </select>
                            @error('penguji2_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="penguji3_id" class="col-sm-2 control-label">Penguji 3</label>

                        <div class="col-sm-10">
                            <select class="form-control select2 @error('penguji3_id') is-invalid @enderror"
                                id="penguji3_id" name="penguji3_id">
                                <option value="" hidden>-- Choose --</option>
                                @foreach ($dosen as $row)
                                    <option value="{{ $row->id }}"
                                        @if (old('penguji3_id', $judul->penguji3_id) == $row->id) selected="selected" @endif>
                                        {{ $row->nama_dosen }}
                                    </option>
                                @endforeach
                            </select>
                            @error('penguji3_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan" class="col-sm-2 control-label">Keterangan </label>

                        <div class="col-sm-10">
                            <textarea class="form-control @error('keterangan') is-invalid @enderror" rows="3" name="keterangan"
                                id="keterangan">{{ old('keterangan', $judul->keterangan) }}</textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sk_pembimbing" class="col-sm-2 control-label">SK Pembimbing <span
                                class="text-red">*</span></label>

                        <div class="col-sm-10">
                            <input type="file" class="form-control @error('sk_pembimbing') is-invalid @enderror"
                                id="sk_pembimbing" name="sk_pembimbing" placeholder="sk_pembimbing">
                            <small class="text-danger">Ukuran File Maksimal 2MB</small>
                            @error('sk_pembimbing')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <p></p>
                            @if ($judul->sk_pembimbing)
                                <a href="{{ route('judul.skPembimbing', $judul->id) }}"
                                    class="btn btn-default btn-sm text-aqua" target="_blank"><i
                                        class="fa fa-file-archive-o"></i></a>
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sk_penguji" class="col-sm-2 control-label">SK Penguji</label>

                        <div class="col-sm-10">
                            <input type="file" class="form-control @error('sk_penguji') is-invalid @enderror"
                                id="sk_penguji" name="sk_penguji" placeholder="sk_penguji">
                            <small class="text-danger">Ukuran File Maksimal 2MB</small>
                            @error('sk_penguji')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <p></p>
                            @if ($judul->sk_penguji)
                                <a href="{{ route('judul.skPenguji', $judul->id) }}"
                                    class="btn btn-default btn-sm text-aqua" target="_blank"><i
                                        class="fa fa-file-archive-o"></i></a>
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">Status <span
                                class="text-red">*</span></label>

                        <div class="col-sm-10">
                            <select class="form-control @error('status') is-invalid @enderror" id="status"
                                name="status">
                                <option value="" hidden>-- Choose --</option>
                                <option value="1" @if (old('status', $judul->status) == 1) selected="selected" @endif>
                                    Proses
                                </option>
                                <option value="0" @if (old('status', $judul->status) == 0) selected="selected" @endif>
                                    Selesai
                                </option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9 text-right">
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
@push('script')
    <!-- Select2 -->
    <script src="{{ URL::asset('build/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('#mahasiswa_id').select2();
            $('#pembimbing1_id').select2();
            $('#pembimbing2_id').select2();
            $('#penguji1_id').select2();
            $('#penguji2_id').select2();
            $('#penguji3_id').select2();
        });
    </script>
@endpush
