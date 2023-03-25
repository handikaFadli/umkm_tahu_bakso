@extends('layouts.main')

@section('content1')
<section class="bg-light">
    <div class="shop-detail-container container mt-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    @php
                        $gambars = App\models\GambarProduk::where('kd_produk', $produk->kd_produk)->first();
                    @endphp
                    <img class="card-img img-fluid" src="{{ asset('fileGambar/'.$gambars->gambar) }}" alt="Card image cap" id="product-detail">
                </div>
                <div class="row">
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class="text-dark fas fa-chevron-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                    </div>
                    <!--End Controls-->
                    <!--Start Carousel Wrapper-->
                    <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                        <!--Start Slides-->
                        <div class="carousel-inner product-links-wap" role="listbox">

                            <!--First slide-->
                            <div class="carousel-item active">
                                <div class="row">
                                    @php
                                        $gambars = App\models\GambarProduk::where('kd_produk', $produk->kd_produk)->get();
                                    @endphp
                                    @foreach ($gambars as $gmbr)
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="{{ asset('fileGambar/'.$gmbr->gambar) }}" alt="Product">
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!--/.First slide-->
                        </div>
                        <!--End Slides-->
                    </div>
                    <!--End Carousel Wrapper-->
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="next">
                            <i class="text-dark fas fa-chevron-right"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!--End Controls-->
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2">{{ $produk->nm_produk.' '. ucfirst($produk->nm_kategori) }}</h1>
                        <p class="h3 py-2">Rp {{ number_format($produk->harga, 0, ',', '.') }}</</p>
                        <p class="py-2">
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <span class="list-inline-item text-dark">Rating 5.0</span>
                        </p>
                        {{-- <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Stok Produk : {{ $produk->stok }}</h6>
                                <h6>Berat Produk : {{ $produk->berat_produk }}</h6>
                                <h6>Jumlah Perkemasan : {{ $produk->jumlah_produk }}</h6>
                                <h6>Jenis Masakan : {{ $produk->jenis_masakan }}</h6>
                                <h6>Masa Penyimpanan : {{ $produk->masa_penyimpanan }}</h6>
                            </li>
                        </ul> --}}
                        <div class="row">
                            <div class="col-10">
                                <table class="table table-borderless">
                                    <tr>
                                        <td><h6>Stok Produk</h6></td>
                                        <td><small>: {{ $produk->stok }} Pcs</small></td>
                                    </tr>
                                    <tr>
                                        <td><h6>Berat Produk</h6></td>
                                        <td><small>: {{ $produk->berat_produk }} Gram</small></td>
                                    </tr>
                                    <tr>
                                        <td><h6>Jumlah Perkemasan</h6></td>
                                        <td><small>: {{ $produk->jumlah_produk }} Biji</small></td>
                                    </tr>
                                    <tr>
                                        <td><h6>Jenis Masakan</h6></td>
                                        <td><small>: {{ $produk->jenis_masakan }}</small></td>
                                    </tr>
                                    <tr>
                                        <td><h6>Masa Penyimpanan</h6></td>
                                        <td><small>: {{ $produk->masa_penyimpanan }}</small></td>
                                    </tr>
                                    <tr>
                                        <td><h6>Deskripsi :</h6></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><small>{!! $produk->ket !!}</small></td>
                                    </tr>
                                </table>
                            </div>
                            
                        </div>
                        
                        {{-- <p>
                            {!! $produk->ket !!}
                        </p> --}}
                        {{-- <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Avaliable Color :</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong>White / Black</strong></p>
                            </li>
                        </ul>

                        <h6>Specification:</h6>
                        <ul class="list-unstyled pb-3">
                            <li>Lorem ipsum dolor sit</li>
                            <li>Amet, consectetur</li>
                            <li>Adipiscing elit,set</li>
                            <li>Duis aute irure</li>
                            <li>Ut enim ad minim</li>
                            <li>Dolore magna aliqua</li>
                            <li>Excepteur sint</li>
                        </ul> --}}

                            {{-- <div class="row">
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item">Size :
                                            <input type="hidden" name="product-size" id="product-size" value="S">
                                        </li>
                                        <li class="list-inline-item"><span class="btn btn-success btn-size">S</span></li>
                                        <li class="list-inline-item"><span class="btn btn-success btn-size">M</span></li>
                                        <li class="list-inline-item"><span class="btn btn-success btn-size">L</span></li>
                                        <li class="list-inline-item"><span class="btn btn-success btn-size">XL</span></li>
                                    </ul>
                                </div>
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item text-right">
                                            Quantity
                                            <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                                        </li>
                                        <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                                        <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                        <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                                    </ul>
                                </div>
                            </div> --}}
                            <div class="row pb-3">
                                <div class="col d-grid">
                                    <a href="https://api.whatsapp.com/send/?phone=+62881024772505&text=Halo+Admin+Saya+ingin+membeli+produk" target="_blank" class="btn btn-success btn-lg" name="submit" value="buy">Buy</a>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section
@endsection