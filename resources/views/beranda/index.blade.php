@extends('layouts.first')
@section('title')
    Beranda
@endsection
@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
        <div class="info d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-6 text-center">
                        <h2>Dinas Sosial Kota Baubau</h2>
                        <p>Dinas Sosial Kota Baubau berkomitmen untuk membangun kesejahteraan masyarakat melalui pelayanan
                            yang
                            peduli, cepat, dan tepat sasaran. Dengan semangat "Peduli, Melayani, Memberdayakan", kami hadir
                            menjangkau yang membutuhkan dan memberdayakan yang rentan demi Baubau yang sejahtera dan
                            berdaya.</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-item">
                <img src="{{ URL::asset('dist/img/images/slider/3.png') }}" alt="">
                <div class="carousel-container">
                    <h2>Temporibus autem quibusdam</h2>
                    <p>Beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit
                        aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt omnis iste
                        natus error sit voluptatem accusantium.</p>
                    <a href="#featured-services" class="btn-get-started">Get Started</a>
                </div>
            </div>
            <div class="carousel-item active">
                <img src="{{ URL::asset('dist/img/images/slider/1.png') }}" alt="">
                <div class="carousel-container">
                    <h2>Temporibus autem quibusdam</h2>
                    <p>Beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit
                        aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt omnis iste
                        natus error sit voluptatem accusantium.</p>
                    <a href="#featured-services" class="btn-get-started">Get Started</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ URL::asset('dist/img/images/slider/2.png') }}" alt="">
                <div class="carousel-container">
                    <h2>Temporibus autem quibusdam</h2>
                    <p>Beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit
                        aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt omnis iste
                        natus error sit voluptatem accusantium.</p>
                    <a href="#featured-services" class="btn-get-started">Get Started</a>
                </div>
            </div>
            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

            <ol class="carousel-indicators">
                <li data-bs-target="#hero-carousel" data-bs-slide-to="0" class=""></li>
                <li data-bs-target="#hero-carousel" data-bs-slide-to="1" class="active" aria-current="true"></li>
                <li data-bs-target="#hero-carousel" data-bs-slide-to="2" class=""></li>
            </ol>
        </div>
    </section>
    <!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">
        <div class="container">
            <div class="row position-relative">
                <div class="col-lg-7 about-img" data-aos="zoom-out" data-aos-delay="200">
                    <a href="https://www.youtube.com/watch?v=DcFhYSXQceY" class="glightbox stretched-link">
                        <div class="video-play"></div>
                    </a>
                    <img src="{{ URL::asset('dist/img/images/tentang/about.jpg') }}">
                </div>
                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="inner-title">Tentang Kami</h2>
                    <div class="our-story">
                        <p>Dinas Sosial Kota Baubau merupakan instansi pemerintah daerah yang memiliki peran strategis dalam
                            meningkatkan kesejahteraan masyarakat, khususnya kelompok rentan seperti anak-anak, lansia,
                            penyandang disabilitas, serta keluarga kurang mampu. Dinas ini bertugas merumuskan dan
                            melaksanakan kebijakan di bidang sosial, termasuk penanganan fakir miskin, perlindungan sosial,
                            rehabilitasi sosial, dan pemberdayaan sosial. Melalui berbagai program bantuan sosial, pelatihan
                            keterampilan, serta kemitraan dengan lembaga lain, Dinas Sosial turut berkontribusi dalam
                            mengurangi angka kemiskinan dan meningkatkan taraf hidup masyarakat Kota Baubau.</p>

                        <p>Sebagai bagian dari pemerintah daerah, Dinas Sosial Kota Baubau juga aktif dalam membangun sistem
                            pelayanan sosial yang transparan dan akuntabel. Pemanfaatan teknologi informasi seperti sistem
                            informasi berbasis web digunakan untuk mendukung pendataan, pengawasan, serta penyampaian
                            informasi kepada publik secara terbuka. Hal ini bertujuan untuk memastikan bahwa bantuan dan
                            layanan sosial tepat sasaran serta dapat diakses oleh seluruh masyarakat yang membutuhkan.
                            Dengan pendekatan kolaboratif dan berkelanjutan, Dinas Sosial berkomitmen menjadi garda terdepan
                            dalam mewujudkan kesejahteraan sosial di Kota Baubau.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /About Section -->

    <!-- Recent Blog Posts Section -->
    <section id="recent-blog-posts" class="recent-blog-posts section light-background">
        <div class="container section-title position-relative d-flex align-items-center justify-content-between">
            <h3 class="inner-title">Kegiatan</h3>
            <a href="{{ url('/kegiatan') }}">Lihat Semua <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="container">
            <div class="row gy-5">
                @foreach ($kegiatans as $kegiatan)
                    <div class="col-xl-4 col-md-4 col-sm-6 col-xs-12">
                        <a href="">
                            <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">
                                <div class="post-img position-relative overflow-hidden">
                                    @if ($kegiatan->gambar)
                                        <img src="{{ asset('storage/' . $kegiatan->gambar) }}" class="img-fluid"
                                            alt="{{ $kegiatan->kategori->name }}">
                                    @else
                                        <img src="{{ URL::asset('dist/img/blog/blog-1.jpg') }}" class="img-fluid"
                                            alt="{{ $kegiatan->kategori->name }}">
                                    @endif
                                </div>
                                <div class="post-content d-flex flex-column">
                                    <h3 class="post-title">{{ $kegiatan->judul }}</h3>
                                    <div class="meta d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <span>{{ $kegiatan->created_at->translatedFormat('d F Y') }}</span>
                                        </div>
                                    </div>
                                    <p>{!! implode(' ', array_slice(explode(' ', $kegiatan->body), 0, 20)) !!}...</p>
                                    <hr>
                                    <a href="{{ route('kegiatan.show', $kegiatan->slug) }}"
                                        class="readmore stretched-link"><span>Detail</span><i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Recent Blog Posts Section -->

    <!-- Recent Blog Posts Section -->
    <section id="recent-blog-posts" class="recent-blog-posts section">
        <div class="container section-title position-relative d-flex align-items-center justify-content-between">
            <h3 class="inner-title">Berita</h3>
            <a href="{{ url('/berita') }}">Lihat Semua <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="container">
            <div class="row gy-5">
                <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
                    <a href="{{ route('berita.show', $artikels[0]->slug) }}">
                        <div class="post-item post-first position-relative" data-aos="fade-up" data-aos-delay="100">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="post-img overflow-hidden">
                                        @if ($artikels[0]->gambar)
                                            <img src="{{ asset('storage/' . $artikels[0]->gambar) }}" class="img-fluid"
                                                alt="{{ $artikels[0]->kategori->name }}">
                                        @else
                                            <img src="{{ URL::asset('dist/img/blog/blog-1.jpg') }}" class="img-fluid"
                                                alt="{{ $artikels[0]->kategori->name }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="post-content d-flex flex-column">
                                        <div class="meta d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                <span class="category">{{ $artikels[0]->kategori->name }}</span>
                                            </div>
                                        </div>
                                        <h3 class="post-title">{{ $artikels[0]->judul }}</h3>
                                        <div class="meta d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                <span>{{ $artikels[0]->created_at->translatedFormat('d F Y, h:s') }}</span>
                                            </div>
                                        </div>
                                        <p>{{ $artikels[0]->kutipan }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @foreach ($artikels->skip(1) as $artikel)
                    <div class="col-xl-4 col-md-4 col-sm-6 col-xs-12">
                        <a href="{{ route('berita.show', $artikel->slug) }}">
                            <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">
                                <div class="post-img position-relative overflow-hidden">
                                    @if ($artikel->gambar)
                                        <img src="{{ asset('storage/' . $artikel->gambar) }}" class="img-fluid"
                                            alt="{{ $artikel->kategori->name }}">
                                    @else
                                        <img src="{{ URL::asset('dist/img/blog/blog-1.jpg') }}" class="img-fluid"
                                            alt="{{ $artikel->kategori->name }}">
                                    @endif
                                </div>
                                <div class="post-content d-flex flex-column">
                                    <div class="meta d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <span class="category">{{ $artikel->kategori->name }}</span>
                                        </div>
                                    </div>
                                    <h3 class="post-title">{{ $artikel->judul }}</h3>
                                    <div class="meta d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <span>{{ $artikel->created_at->translatedFormat('d F Y') }}</span>
                                        </div>
                                    </div>
                                    <p>{{ $artikel->kutipan }}</p>
                                    <hr>
                                    <a href="{{ route('berita.show', $artikel->slug) }}"
                                        class="readmore stretched-link"><span>Detail</span><i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Recent Blog Posts Section -->

    <!-- Announcement Section -->
    <section id="services" class="services section light-background">
        <div class="container section-title position-relative d-flex align-items-center justify-content-between">
            <h3 class="inner-title">Pengumuman</h3>
            <a href="{{ url('/pengumuman') }}">Lihat Semua <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="container">
            <div class="row gy-4">
                @foreach ($pengumumans as $pengumuman)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <a href="{{ route('pengumuman.show', $pengumuman->slug) }}">
                            <div class="service-item  position-relative">
                                <h3>{{ $pengumuman->judul }}</h3>
                                <p>{!! implode(' ', array_slice(explode(' ', $pengumuman->body), 0, 20)) !!}...</p>
                                <p class="mt-2 muted">{{ $pengumuman->created_at->translatedFormat('d F Y, h:s') }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Announcement Section -->
@endsection
