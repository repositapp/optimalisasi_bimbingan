@extends('layouts.master')
@section('title')
    Ubah Jadwal Bimbingan
@endsection
@push('css')
    <!-- bootstrap datepicker -->
    <link rel="stylesheet"
        href="{{ URL::asset('build/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{ URL::asset('build/plugins/timepicker/bootstrap-timepicker.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ URL::asset('build/bower_components/select2/dist/css/select2.min.css') }}">
@endpush
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Jadwal Bimbingan
        @endslot
        @slot('li_2')
            Jadwal Bimbingan
        @endslot
        @slot('title')
            Ubah Jadwal Bimbingan
        @endslot
    @endcomponent

    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Form Input</h3>
                <div class="pull-right box-tools">
                    <a href="{{ route('jadwal.index') }}" class="btn btn-social btn-sm btn-default">
                        <i class="fa fa-reply"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="box-body">
                <form class="form-horizontal" action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="judul_id" class="col-sm-2 control-label">Judul <span class="text-red">*</span></label>

                        <div class="col-sm-10">
                            <select class="form-control select2 @error('judul_id') is-invalid @enderror" id="judul_id"
                                name="judul_id">
                                <option value="" hidden>-- Choose --</option>
                                @foreach ($juduls as $row)
                                    <option value="{{ $row->id }}"
                                        @if (old('judul_id', $jadwal->id) == $row->id) selected="selected" @endif>
                                        {{ $row->judul }}
                                    </option>
                                @endforeach
                            </select>
                            @error('judul_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pembimbing_id" class="col-sm-2 control-label">Pembimbing<span
                                class="text-red">*</span></label>

                        <div class="col-sm-10">
                            <select class="form-control select2 @error('pembimbing_id') is-invalid @enderror"
                                id="pembimbing_id" name="pembimbing_id">
                                <option value="">-- Choose --</option>
                                @foreach ($dosens as $row)
                                    <option value="{{ $row->id }}"
                                        @if (old('pembimbing_id', $jadwal->pembimbing_id) == $row->id) selected="selected" @endif>
                                        {{ $row->judul }}
                                    </option>
                                @endforeach
                            </select>
                            @error('pembimbing_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_bimbingan" class="col-sm-2 control-label">Tanggal <span
                                class="text-red">*</span></label>

                        <div class="col-sm-10">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text"
                                    class="form-control pull-right @error('tanggal_bimbingan') is-invalid @enderror"
                                    id="datepicker" name="tanggal_bimbingan"
                                    value="{{ old('tanggal_bimbingan', \Carbon\Carbon::parse(now())->translatedFormat($jadwal->tanggal_bimbingan)) }}"
                                    placeholder="dd/mm/yyyy">
                            </div>
                            @error('tanggal_bimbingan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="waktu_mulai" class="col-sm-2 control-label">Waktu Mulai <span
                                class="text-red">*</span></label>

                        <div class="col-sm-10">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <input type="text"
                                    class="form-control pull-right timepicker @error('waktu_mulai') is-invalid @enderror"
                                    id="datepicker" name="waktu_mulai"
                                    value="{{ old('waktu_mulai', $jadwal->waktu_mulai ? \Carbon\Carbon::createFromFormat('H:i', $jadwal->waktu_mulai)->format('h:i A') : '') }}"
                                    placeholder="hh:mm am/pm">
                            </div>
                            @error('waktu_mulai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="waktu_selesai" class="col-sm-2 control-label">Waktu Selesai <span
                                class="text-red">*</span></label>

                        <div class="col-sm-10">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <input type="text"
                                    class="form-control pull-right timepicker @error('waktu_selesai') is-invalid @enderror"
                                    id="datepicker" name="waktu_selesai"
                                    value="{{ old('waktu_selesai', $jadwal->waktu_selesai ? \Carbon\Carbon::createFromFormat('H:i', $jadwal->waktu_selesai)->format('h:i A') : '') }}"
                                    placeholder="hh:mm am/pm">
                            </div>
                            @error('waktu_selesai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="topik_bimbingan" class="col-sm-2 control-label">Topik Bimbingan <span
                                class="text-red">*</span></label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('topik_bimbingan') is-invalid @enderror"
                                id="topik_bimbingan" name="topik_bimbingan"
                                value="{{ old('topik_bimbingan', $jadwal->topik_bimbingan) }}"
                                placeholder="Topik Bimbingan">
                            @error('topik_bimbingan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tempat" class="col-sm-2 control-label">Lokasi Bimbingan <span
                                class="text-red">*</span></label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('tempat') is-invalid @enderror"
                                id="tempat" name="tempat" value="{{ old('tempat', $jadwal->tempat) }}"
                                placeholder="Lokasi Bimbingan">
                            @error('tempat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">Status <span
                                class="text-red">*</span></label>

                        <div class="col-sm-10">
                            <select class="form-control @error('status') is-invalid @enderror" id="status"
                                name="status">
                                <option value="" hidden>-- Choose --</option>
                                <option value="dijadwalkan" @if (old('status', $jadwal->status) == 'dijadwalkan') selected="selected" @endif>
                                    Dijadwalkan
                                </option>
                                <option value="selesai" @if (old('status', $jadwal->status) == 'selesai') selected="selected" @endif>
                                    Selesai
                                </option>
                                <option value="batal" @if (old('status', $jadwal->status) == 'batal') selected="selected" @endif>
                                    Batal
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
@push('script')
    <!-- bootstrap datepicker -->
    <script src="{{ URL::asset('build/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}">
    </script>
    <!-- bootstrap time picker -->
    <script src="{{ URL::asset('build/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ URL::asset('build/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

    <script>
        $(function() {
            //Date picker
            $('#datepicker').datepicker({
                autoclose: true
            });

            //Timepicker
            $('.timepicker').timepicker({
                showInputs: false
            });

            //Initialize Select2 Elements
            $('#judul_id').select2();
            $('#pembimbing_id').select2();
        });

        $('#judul_id').on('change', function() {
            var judulId = $(this).val();
            $('#pembimbing_id').html('<option value="">-- Choose --</option>');

            if (judulId) {
                $.ajax({
                    url: '/panel/get-pembimbing/' + judulId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        if (data.length > 0) {
                            $.each(data, function(key, pembimbing) {
                                $('#pembimbing_id').append('<option value="' + pembimbing.id +
                                    '">' + pembimbing.nama + '</option>');
                            });
                        } else {
                            $('#pembimbing_id').append(
                                '<option value="">Tidak ada pembimbing tersedia</option>');
                        }
                    }
                });
            }
        });
    </script>
@endpush
