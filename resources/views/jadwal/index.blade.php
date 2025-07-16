@extends('layouts.master')
@section('title')
    Jadwal Bimbingan
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Jadwal Bimbingan
        @endslot
        @slot('li_2')
            Jadwal Bimbingan
        @endslot
        @slot('title')
            Jadwal Bimbingan
        @endslot
    @endcomponent

    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <div class="row align-items-center">
                    <div class="col-md-6 align-items-center">
                        <form action="{{ route('jadwal.index') }}">
                            <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                                <input type="text" name="search" class="form-control pull-right" placeholder="Search..."
                                    value="{{ request('search') }}">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('jadwal.create') }}" class="btn btn-social btn-sm btn-info">
                            <i class="fa fa-plus"></i> Tambah Data
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 40px">No.</th>
                            <th>Judul</th>
                            <th>Mahasiswa</th>
                            <th>Pembimbing</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Topik</th>
                            <th>Lokasi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jadwals as $jadwal)
                            <tr>
                                <td class="text-center">{{ $jadwals->firstItem() + $loop->index }}</td>
                                <td>{{ $jadwal->judul->judul }}</td>
                                <td>{{ $jadwal->judul->mahasiswa->nama_mahasiswa }}</td>
                                <td>{{ $jadwal->pembimbing->nama_dosen }}</td>
                                <td>{{ \Carbon\Carbon::parse($jadwal->tanggal)->locale('id')->translatedFormat('d F Y') }}
                                </td>
                                <td>{{ $jadwal->waktu_mulai }} - {{ $jadwal->waktu_selesai }}</td>
                                <td>{{ $jadwal->topik_bimbingan }}</td>
                                <td>{{ $jadwal->tempat }}</td>
                                <td class="text-center">
                                    <div class="btn-group d-flex">
                                        <a href="{{ route('jadwal.edit', $jadwal->id) }}"
                                            class="btn btn-default btn-sm text-green"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-default btn-sm text-red"><i
                                                    class="fa fa-trash-o"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">
                                    Jadwal bimbingan belum tersedia.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <div class="row align-items-center">
                    <div class="col-md-6 align-items-center">
                        Menampilkan
                        {{ $jadwals->firstItem() }}
                        hingga
                        {{ $jadwals->lastItem() }}
                        dari
                        {{ $jadwals->total() }} entri
                    </div>
                    <div class="col-md-6">
                        <div class="pull-right">
                            {{ $jadwals->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
