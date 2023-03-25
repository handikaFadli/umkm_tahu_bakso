@extends('admin.layouts.main')

@section('content')
{{-- <div class="card mb-5 shadow px-0 bg-white rounded" style="max-width: 800px;">
    <div class="row no-gutters"> --}}
        {{-- <div class="col-md-5">
            <img src="{{ asset('fileGambar/'.$produk->gambar) }}" class="img-fluid rounded mx-auto d-block" width="300px" height="100px">
        </div> --}}
        {{-- <div class="col-md-7">
            <div class="card-body">
                <h5 class="card-title">{{ $produk->nm_produk .' '. ucfirst($produk->nm_kategori).' - '. $produk->stok}}</h5> --}}
                {{-- <p class="card-text">{!! $produk->ket !!}</p> --}}
                {{-- <p class="card-text">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                <a href="/produk">
                    <p class="card-text"><small class="text-muted">Back</small></p>
                </a>
            </div>
        </div>
    </div>
</div> --}}
<div class="card">
    <div class="card-header text-center">
      {{ $produk->kd_produk }}
    </div>
    <div class="card-body">
        @foreach ($gambar as $gm)
        <img src="{{ asset('fileGambar/'.$gm->gambar) }}" class="img-fluid rounded mx-auto d-inline px-2 mb-5 justify-content-center" width="200px" height="150px">
        @endforeach
      <h5 class="card-title">{{ $produk->nm_produk .' '. ucfirst($produk->nm_kategori)}}</h5>
      <div class="card-text">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Nama Produk : {{ $produk->nm_produk }}</li>
            <li class="list-group-item">Kategori Produk : {{ $produk->nm_kategori }}</li>
            <li class="list-group-item">Harga Produk : Rp {{ number_format($produk->harga, 0, ',', '.') }}</li>
            <li class="list-group-item">Stok Produk : {{ $produk->stok }} pcs</li>
            <li class="list-group-item">Jumlah Perkemasan : {{ $produk->jumlah_produk }} buah</li>
            <li class="list-group-item">Berat Produk : {{ $produk->berat_produk }}</li>
            <li class="list-group-item">Jenis Masakan : {{ $produk->jenis_masakan }}</li>
            <li class="list-group-item">Masa Penyimpanan : {{ $produk->masa_penyimpanan }}</li>
            <li class="list-group-item"><p class="">{!! $produk->ket !!}</p></li>
          </ul>
      </div>
    </div>
    <div class="card-footer text-muted ">
        <a href="/produk">
            <p class="card-text"><small class="text-muted">Back</small></p>
        </a>
    </div>
  </div>
@endsection