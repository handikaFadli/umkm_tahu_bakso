@extends('layouts.main')

@section('content1')
<div id="template-mo-zay-hero-carousel" class="home-carousel carousel slide mt-5" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="{{ asset('carousel/ori.svg') }}" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left align-self-center">
                            <h1 class="h1">Tahu Bakso Original</h1>
                            <p>
                                Perpaduan antara daging ayam dan sapi yang diolah menjadi tahu bakso, bisa digoreng maupun dikukus dan disajikan dengan sambal kecap khas yang sedikit pedas.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="{{ asset('carousel/rawit.svg') }}" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1">Tahu Bakso Rawit</h1>
                            <p>
                                Perpaduan antara daging ayam dan sapi yang diolah menjadi tahu bakso ditambahkan cabai rawit yang pedas. Bisa digoreng maupun dikukus. Cocok untuk para pecinta makanan pedas.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="{{ asset('carousel/mix.svg') }}" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1">Tahu Bakso Mix</h1>
                            <p>
                                Perpaduan antara daging ayam dan sapi yang diolah menjadi tahu bakso, bisa digoreng maupun dikukus. Varian ini merupakan kombinasi antara tahu bakso original dan tahu bakso rawit.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
        <i class="fas fa-chevron-right"></i>
    </a>
</div>
@endsection

{{-- @section('content2')
<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Categories of The Month</h1>
            <p>
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-4 p-5 mt-3">
            <a href="#"><img src="./assets/img/category_img_01.jpg" class="rounded-circle img-fluid border"></a>
            <h5 class="text-center mt-3 mb-3">Watches</h5>
            <p class="text-center"><a class="btn btn-success">Go Shop</a></p>
        </div>
        <div class="col-12 col-md-4 p-5 mt-3">
            <a href="#"><img src="./assets/img/category_img_02.jpg" class="rounded-circle img-fluid border"></a>
            <h2 class="h5 text-center mt-3 mb-3">Shoes</h2>
            <p class="text-center"><a class="btn btn-success">Go Shop</a></p>
        </div>
        <div class="col-12 col-md-4 p-5 mt-3">
            <a href="#"><img src="./assets/img/category_img_03.jpg" class="rounded-circle img-fluid border"></a>
            <h2 class="h5 text-center mt-3 mb-3">Accessories</h2>
            <p class="text-center"><a class="btn btn-success">Go Shop</a></p>
        </div>
    </div>
</section>
@endsection --}}

@section('content3')
<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Real Picture</h1>
                <p>
                    Halo sobat Jani! Kamu butuh cemilan untuk menemani keseharianmu? Yuk cobain tahu bakso sambal kecap jani dengan berbagai varian yang ada di bawah ini! Dijamin bikin kamu ketagihan!
                </p>
            </div>
        </div>
        <div class="row">
            @foreach ($produk as $p)
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="shop-single.html">
                            @php
                                $gambars = App\models\GambarProduk::where('kd_produk', $p->kd_produk)->first();
                            @endphp
                            <img src="{{ asset('fileGambar/'.$gambars->gambar) }}" class="card-img-top" alt="produk">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">Rp {{ number_format($p->harga, 0, ',', '.') }}</li>
                            </ul>
                            <a href="shop-single.html" class="h2 text-decoration-none text-dark">{{ $p->nm_produk.' '. ucfirst($p->nm_kategori) }}</a>
                            {{-- <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt in culpa qui officia deserunt.
                            </p> --}}
                            <p class="text-muted mt-3">Sisa : {{ $p->stok }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            
            {{-- <div class="col-12 col-md-4 mb-4">
                <div class="card h-100">
                    <a href="shop-single.html">
                        <img src="./assets/img/feature_prod_02.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                            </li>
                            <li class="text-muted text-right">$480.00</li>
                        </ul>
                        <a href="shop-single.html" class="h2 text-decoration-none text-dark">Cloud Nike Shoes</a>
                        <p class="card-text">
                            Aenean gravida dignissim finibus. Nullam ipsum diam, posuere vitae pharetra sed, commodo ullamcorper.
                        </p>
                        <p class="text-muted">Reviews (48)</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="card h-100">
                    <a href="shop-single.html">
                        <img src="./assets/img/feature_prod_03.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                            </li>
                            <li class="text-muted text-right">$360.00</li>
                        </ul>
                        <a href="shop-single.html" class="h2 text-decoration-none text-dark">Summer Addides Shoes</a>
                        <p class="card-text">
                            Curabitur ac mi sit amet diam luctus porta. Phasellus pulvinar sagittis diam, et scelerisque ipsum lobortis nec.
                        </p>
                        <p class="text-muted">Reviews (74)</p>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>
@endsection