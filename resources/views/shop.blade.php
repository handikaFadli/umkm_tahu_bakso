@extends('layouts.main')

@section('content1')
        <!-- Start Content -->
        <div class="shop-container container mt-5">
            <div class="row">
    
                <div class="col-lg-3">
                    <h1 class="h2 pb-4">All Products</h1>
                    {{-- <ul class="list-unstyled templatemo-accordion">
                        <li class="pb-3">
                            <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                                Gender
                                <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                            </a>
                            <ul class="collapse show list-unstyled pl-3">
                                <li><a class="text-decoration-none" href="#">Men</a></li>
                                <li><a class="text-decoration-none" href="#">Women</a></li>
                            </ul>
                        </li>
                        <li class="pb-3">
                            <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                                Sale
                                <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                            </a>
                            <ul id="collapseTwo" class="collapse list-unstyled pl-3">
                                <li><a class="text-decoration-none" href="#">Sport</a></li>
                                <li><a class="text-decoration-none" href="#">Luxury</a></li>
                            </ul>
                        </li>
                        <li class="pb-3">
                            <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                                Product
                                <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                            </a>
                            <ul id="collapseThree" class="collapse list-unstyled pl-3">
                                <li><a class="text-decoration-none" href="#">Bag</a></li>
                                <li><a class="text-decoration-none" href="#">Sweather</a></li>
                                <li><a class="text-decoration-none" href="#">Sunglass</a></li>
                            </ul>
                        </li>
                    </ul> --}}
                </div>
    
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-md-6 pb-4">
                            <div class="d-flex">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        @foreach ($produk as $p)
                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                    @php
                                        $gambars = App\models\GambarProduk::where('kd_produk', $p->kd_produk)->first();
                                    @endphp
                                    <img class="card-img rounded-0 img-fluid" src="{{ asset('fileGambar/'.$gambars->gambar) }}">
                                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        <ul class="list-unstyled">
                                            <li><a class="btn btn-success text-white mt-2" href="/shop/detail/{{ $p->kd_produk }}"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="/shop/detail/{{ $p->kd_produk }}" class="h3 text-decoration-none">{{ $p->nm_produk.' '. ucfirst($p->nm_kategori) }}</a>
                                    <ul class="list-unstyled d-flex justify-content-center mb-1">
                                        <li>
                                            <i class="text-warning fa fa-star"></i>
                                            <i class="text-warning fa fa-star"></i>
                                            <i class="text-warning fa fa-star"></i>
                                            <i class="text-warning fa fa-star"></i>
                                            <i class="text-warning fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <p class="text-center mb-0">Rp {{ number_format($p->harga, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content -->
@endsection