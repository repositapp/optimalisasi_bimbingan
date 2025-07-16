@extends('layouts.first')
@section('title')
    Kegiatan
@endsection
@section('content')
    <div class="page-title dark-background" style="background-image: url('{{ URL::asset('dist/img/page-title-bg.jpg') }}');">
        <div class="container position-relative">
            <h1>Kegiatan</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('index') }}">Beranda</a></li>
                    <li><a href="{{ url('/kegiatan') }}">Kegiatan</a></li>
                    <li class="current">Detail Kegiatan</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-lg-12">

                <!-- Blog Details Section -->
                <section id="blog-details" class="blog-details section">
                    <article class="article" data-aos="fade-right" data-aos-delay="100">
                        <h2 class="title">{{ $kegiatan->judul }}</h2>
                        <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-folder"></i>
                                    <a href="blog-details.html">{{ $kegiatan->kategori->name }}</a>
                                </li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i>
                                    <a href="blog-details.html"><time
                                            datetime="2020-01-01">{{ $kegiatan->created_at->translatedFormat('d F Y, h:s') }}</time></a>
                                </li>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i>
                                    <a href="blog-details.html">{{ $kegiatan->author->name }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="post-img">
                            @if ($kegiatan->gambar)
                                <img src="{{ asset('storage/' . $kegiatan->gambar) }}" class="img-fluid"
                                    alt="{{ $kegiatan->kategori->name }}">
                            @else
                                <img src="{{ URL::asset('dist/img/blog/blog-6.jpg') }}" class="img-fluid"
                                    alt="{{ $kegiatan->kategori->name }}">
                            @endif
                        </div>
                        <div class="content">
                            <p>{!! $kegiatan->body !!}</p>
                        </div>
                    </article>
                </section>
            </div>
        </div>
    </div>
@endsection
