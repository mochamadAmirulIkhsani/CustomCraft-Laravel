@extends('layouts.app')

@section('title', 'Selamat Datang')

@section('content')

{{-- Bagian 1: Carousel Modern & Full-Width --}}
@if(!empty($bannerImages))
<div class="hero-carousel-container">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">

        {{-- Indikator Kustom --}}
        <div class="carousel-indicators custom-indicators">
            @foreach($bannerImages as $imagePath)
                <button
                    type="button"
                    data-bs-target="#heroCarousel"
                    data-bs-slide-to="{{ $loop->index }}"
                    class="{{ $loop->first ? 'active' : '' }}"
                    aria-current="{{ $loop->first ? 'true' : 'false' }}"
                    aria-label="Slide {{ $loop->iteration }}">
                </button>
            @endforeach
        </div>

        <div class="carousel-inner">
            @foreach($bannerImages as $imagePath)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="hero-slide" style="background-image: url('{{ asset('storage/' . $imagePath) }}');">
                        {{-- Lapisan Overlay Gelap --}}
                        <div class="hero-overlay"></div>

                        {{-- Konten Teks di Atas Slide --}}
                        <div class="container hero-caption">
                            <h1 class="display-4 fw-bolder animate__animated animate__fadeInDown">Wujudkan Ide Kustom Anda</h1>
                            <p class="lead fs-5 mb-4 animate__animated animate__fadeInUp">Dari kaos hingga lanyard, kami hadir untuk membuat produk unik Anda menjadi nyata.</p>
                            <a href="{{ route('catalogue') }}" class="btn btn-lg btn-light fw-bold animate__animated animate__fadeInUp">
                                Lihat Produk <i class="bi bi-arrow-right-short"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if(count($bannerImages) > 1)
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        @endif
    </div>
</div>
@endif

{{-- Bagian 2: Fitur Utama (Best Quality, etc) --}}
<div class="py-3 bg-maroon text-white">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="feature-box mx-auto">
                    <div class="feature-icon">
                        <img src="{{ asset('images/icon/thumbs-up.svg') }}" class="feature-icon" alt="Best Quality Icon">
                    </div>
                    <div class="feature-text text-start">
                        <h6>Best Quality</h6>
                        <p>Kami selalu menggunakan bahan terbaik untuk semua produk</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-box mx-auto">
                    <div class="feature-icon">
                        <img src="{{ asset('images/icon/professional.svg') }}" class="feature-icon" alt="Professional Icon">
                    </div>
                    <div class="feature-text text-start">
                        <h6>Professional</h6>
                        <p>Dibuat dengan hati-hati dan presisi memastikan bahwa produk menjadi hasil final yang baik</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-box mx-auto">
                    <div class="feature-icon">
                        <img src="{{ asset('images/icon/price.svg') }}" class="feature-icon" alt="Harga Icon">
                    </div>
                    <div class="feature-text text-start">
                        <h6>Harga</h6>
                        <p>Kami memberikan harga yang terjangkau tanpa mengorbankan kualitas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Bagian 3: Why Choose Us --}}
<div class="py-3">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-md-6 text-center mb-4 mb-md-0">
                <img src="{{ asset('images/thumbsup.png') }}" alt="thumbs-up" class="img-fluid rounded">
            </div>
            <div class="col-md-6">
                <h2 class="fw-bold mb-3">Mengapa <br />Menggunakan Jasa Kami ?</h2>
                <p class="mb-4">
                    Berusaha menciptakan setiap cetakan dengan kualitas unggul tanpa kompromi demi memastikan kepuasan pelanggan yang tinggi, sekaligus terus menerapkan inovasi dalam proses produksi untuk meningkatkan efisiensi, ketepatan, dan kecepatan dalam menghasilkan produk berkualitas.
                    <br><br>
                    Selain itu, memastikan setiap cetakan memiliki keunggulan yang membedakan, baik dari segi desain, keakuratan, maupun keandalan, sehingga mampu memperkuat reputasi dan citra merek.
                </p>

                {{-- Mengganti v-for dengan @foreach --}}
                @foreach($features as $item)
                <div class="d-flex mb-4 align-items-start">
                    <div class=" rounded text-white me-3 d-flex justify-content-center align-items-center">
                        <img src="{{ asset($item['icon']) }}" alt="feature icon" class="img-fluid" style="width: 100%; height: 100%">
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">{{ $item['title'] }}</h6>
                        <p class="mb-0 small">{{ $item['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

{{-- Bagian 4: Our Service / Galeri Produk --}}
<div class="container py-5 text-center">
    <p class="text-uppercase fw-bold small">Our Service</p>
    <h2 class="fw-bold">Ayo Wujudkan Desain Idemu!</h2>

    <div class="row mt-4">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <a href="{{ route('product.detail', $product) }}" class="text-decoration-none">
                <div class="position-relative service-item">
                    <img
                        src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->nama_produk }}"
                        {{-- TAMBAHKAN CLASS BARU 'service-item-image' --}}
                        class="img-fluid rounded shadow service-item-image">

                    <div class="position-absolute top-50 start-50 translate-middle text-white fw-bold fs-5" style="text-shadow: 1px 1px 4px black;">
                        {{ strtoupper($product->nama_produk) }}
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <div>
        <a href="{{ route('catalogue') }}" class="btn btn-secondary mt-4">
            Produk Lainnya
        </a>
    </div>
</div>

{{-- Bagian 5: Testimoni Pelanggan --}}
<div class="container py-5">
    <h2 class="text-center fw-bold mb-5 text-uppercase" style="letter-spacing: 2px;">
      What Our Customers Say
    </h2>
    <div class="row g-4">
        {{-- Mengganti v-for dengan @foreach --}}
        @foreach($reviews as $review)
        <div class="col-md-6 col-lg-6">
            <div class="card review-card h-100 border-0 shadow-sm bg-light">
                <div class="position-relative">
                    <img src="{{ asset($review['image']) }}" class="card-img-top rounded-top review-image" alt="Customer Review">
                    <div class="overlay-gradient rounded-top"></div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

@push('styles')
<style>
    .bg-maroon {
        background-color: #8b1c1c;
    }
    .feature-box {
        border-radius: 10px;
        padding: 20px;
        display: inline-flex;
        align-items: center;
        width: 100%;
        max-width: 350px; /* Optional: to keep them from stretching too much */
        height: 100px;
    }
    .feature-icon {
        width: 40px;
        height: 40px;
        margin-right: 15px;
    }
    .feature-text h6 {
        margin: 0;
        font-weight: bold;
        color: rgb(255, 255, 255);
    }
    .feature-text p {
        margin: 0;
        font-size: 12px;
        color: rgb(255, 255, 255);
    }
    .icon-box {
        width: 50px;
        height: 50px;
        flex-shrink: 0; /* Mencegah ikon menyusut */
        padding: 10px;
    }
    .review-card {
        border-radius: 16px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .review-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
    }
    .review-image {
        height: 250px;
        width: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    .review-card:hover .review-image {
        transform: scale(1.05);
    }
    .overlay-gradient {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3), transparent 70%);
    }
    .service-item {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;

        /* BERI TINGGI YANG TETAP UNTUK WADAH */
        height: 250px; /* Anda bisa sesuaikan tingginya */
    }

    /* CSS BARU UNTUK GAMBAR */
    .service-item-image {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ini adalah kuncinya! "Zoom" gambar tanpa distorsi */
        transition: transform 0.3s ease;
    }

    .service-item:hover {
        transform: scale(1.03);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    /* Efek hover zoom sekarang diterapkan ke gambar, bukan ke wadahnya */
    .service-item:hover .service-item-image {
        transform: scale(1.1);
    }

    /* --- Gaya Carousel Modern --- */
    .hero-carousel-container {
        /* Menghilangkan padding dari container bootstrap */
        margin-left: calc(-1 * var(--bs-gutter-x) * 0.5);
        margin-right: calc(-1 * var(--bs-gutter-x) * 0.5);
    }

    .hero-slide {
        height: 80vh; /* Tinggi carousel setinggi 80% layar */
        min-height: 500px;
        background-size: cover;
        background-position: center;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Overlay gelap */
        z-index: 1;
    }

    .hero-caption {
        position: relative;
        z-index: 2;
        text-align: center;
        color: white;
    }

    /* --- Indikator Kustom --- */
    .custom-indicators {
        bottom: 30px;
    }
    .custom-indicators [data-bs-target] {
        width: 30px; /* Lebar setiap indikator */
        height: 4px; /* Tinggi indikator, membuatnya jadi garis */
        margin: 0 5px;
        border-radius: 0; /* Menghilangkan bentuk bulat */
        background-color: rgba(255, 255, 255, 0.5);
        border: none;
        opacity: 0.7;
        transition: opacity 0.6s ease;
    }

    .custom-indicators .active {
        opacity: 1;
        background-color: white;
    }

    /* --- Animasi Tombol di Caption --- */
    .hero-caption .btn {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hero-caption .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }
</style>
@endpush
