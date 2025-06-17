@extends('layouts.app')

@section('title', 'Detail Produk - ' . $product->nama_produk)

@section('content')
    <div class="container my-5">
        <div class="row">
            {{-- Kolom Gambar --}}
            <div class="col-md-6">
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded shadow mb-3"
                    alt="Gambar utama {{ $product->nama_produk }}">

                {{-- Tampilkan gambar galeri jika ada --}}
                <div class="row g-2">
                    @if ($product->image2)
                        <div class="col-4">
                            <img src="{{ asset('storage/' . $product->image2) }}" class="img-fluid rounded shadow"
                                alt="Gambar 2">
                        </div>
                    @endif
                    @if ($product->image3)
                        <div class="col-4">
                            <img src="{{ asset('storage/' . $product->image3) }}" class="img-fluid rounded shadow"
                                alt="Gambar 3">
                        </div>
                    @endif
                    @if ($product->image4)
                        <div class="col-4">
                            <img src="{{ asset('storage/' . $product->image4) }}" class="img-fluid rounded shadow"
                                alt="Gambar 4">
                        </div>
                    @endif
                </div>
            </div>

            {{-- Kolom Deskripsi --}}
            <div class="col-md-6">
                <h1 class="fw-bold">{{ $product->nama_produk }}</h1>
                <hr>
                <h5 class="text-muted">Deskripsi Produk</h5>
                <div class="product-description">
                    {!! $product->deskripsi !!}
                </div>

                <div class="d-grid gap-2 mt-4">
                    <a href="https://wa.me/{{ $product->no_whatsapp }}?text=Halo,%20saya%20tertarik%20dengan%20produk%20{{ urlencode($product->nama_produk) }}"
                        target="_blank" class="btn btn-success btn-lg">
                        <i class="bi bi-whatsapp"></i> Hubungi via WhatsApp ({{ $product->no_whatsapp }})
                    </a>
                    <a href="{{ route('catalogue') }}" class="btn btn-secondary mt-2">
                        Kembali ke Katalog
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
