@extends('layouts.master')
@section('title')
    Kegiatan
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Kegiatan
        @endslot
        @slot('li_2')
            Kegiatan
        @endslot
        @slot('title')
            Kegiatan
        @endslot
    @endcomponent

    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <div class="row align-items-center">
                    <div class="col-md-6 align-items-center">
                        <form action="{{ route('kegiatan.index') }}">
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
                        <a href="{{ route('kegiatan.create') }}" class="btn btn-social btn-sm btn-info">
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
                            <th scope="col">Kategori</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Dibuat</th>
                            <th scope="col">Status</th>
                            <th class="text-center" style="width: 80px">Aksi</th>
                        </tr>
                    </thead>
                    <Tbody>
                        @forelse ($kegiatans as $kegiatan)
                            <tr>
                                <td class="text-center">{{ $kegiatans->firstItem() + $loop->index }}</td>
                                <td>{{ $kegiatan->kategori->name }}</td>
                                <td>{{ $kegiatan->judul }}</td>
                                <td>{{ $kegiatan->author->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($kegiatan->created_at)->locale('id')->translatedFormat('d F Y, H:i') }}
                                </td>
                                <td>
                                    @if ($kegiatan->status == 0)
                                        <span class="label label-danger">Private</span>
                                    @else
                                        <span class="label label-success">Publish</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group d-flex">
                                        <a href="{{ route('kegiatan.edit', $kegiatan->id) }}"
                                            class="btn btn-default btn-sm text-green"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('kegiatan.destroy', $kegiatan->id) }}" method="POST"
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
                                <td colspan="7" class="text-center">
                                    Data kegiatan belum Tersedia.
                                </td>
                            </tr>
                        @endforelse
                    </Tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <div class="row align-items-center">
                    <div class="col-md-6 align-items-center">
                        Menampilkan
                        {{ $kegiatans->firstItem() }}
                        hingga
                        {{ $kegiatans->lastItem() }}
                        dari
                        {{ $kegiatans->total() }} entri
                    </div>
                    <div class="col-md-6">
                        <div class="pull-right">
                            {{ $kegiatans->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
