@extends('layouts.master')
@section('title')
    Judul Skripsi
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Master Data
        @endslot
        @slot('li_2')
            Judul Skripsi
        @endslot
        @slot('title')
            Judul Skripsi
        @endslot
    @endcomponent

    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <div class="row align-items-center">
                    <div class="col-md-6 align-items-center">
                        <form action="{{ route('judul.index') }}">
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
                        <a href="{{ route('judul.create') }}" class="btn btn-social btn-sm btn-info">
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
                            <th scope="col" style="width: 250px">Judul</th>
                            <th scope="col">Mahasiswa</th>
                            <th scope="col">Pembimbing 1</th>
                            <th scope="col">Pembimbing 2</th>
                            <th scope="col">Penguji 1</th>
                            <th scope="col">Penguji 2</th>
                            <th scope="col">Penguji 3</th>
                            <th scope="col">Status</th>
                            <th class="text-center" style="width: 80px">Aksi</th>
                        </tr>
                    </thead>
                    <Tbody>
                        @forelse ($juduls as $judul)
                            <tr>
                                <td class="text-center">{{ $juduls->firstItem() + $loop->index }}</td>
                                <td>{{ $judul->judul }}</td>
                                <td>{{ $judul->mahasiswa->nama_mahasiswa }}</td>
                                <td>{{ $judul->pembimbing1->nama_dosen }}</td>
                                <td>{{ $judul->pembimbing2->nama_dosen }}</td>
                                <td>{{ $judul->penguji1->nama_dosen }}</td>
                                <td>{{ $judul->penguji2->nama_dosen }}</td>
                                <td>{{ $judul->penguji3->nama_dosen }}</td>
                                <td>
                                    @if ($judul->status == 0)
                                        <span class="label label-info">Selesai</span>
                                    @else
                                        <span class="label label-success">Proses</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group d-flex">
                                        <a href="{{ route('judul.edit', $judul->id) }}"
                                            class="btn btn-default btn-sm text-green"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('judul.destroy', $judul->id) }}" method="POST"
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
                                <td colspan="10" class="text-center">
                                    Data judul belum Tersedia.
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
                        {{ $juduls->firstItem() }}
                        hingga
                        {{ $juduls->lastItem() }}
                        dari
                        {{ $juduls->total() }} entri
                    </div>
                    <div class="col-md-6">
                        <div class="pull-right">
                            {{ $juduls->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
