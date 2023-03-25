@extends('admin.layouts.main')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card shadow px-0 bg-white rounded">
            <div class="card-body">
                <h4 class="card-title">Gambar Produk</h4>
                @foreach ($gambar as $gmbr)
                <div class="d-inline-flex px-1 mb-3">
                    <img src="{{ asset('fileGambar/'.$gmbr->gambar) }}" class="rounded border" style="width: 5rem;">

                    <div class="my-auto">
                        <form action="{{ route('GambarProduk.destroy',$gmbr->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="border: none; background-color: transparent;" class="text-danger">x</button>
                        </form>
                    </div>
                </div>
                @endforeach
                <form action="{{ route('GambarProduk.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="hidden" name="kd_produk" value="{{ $produk->kd_produk }}">
                            <input type="file" class="custom-file-input" id="gambar" name="gambar[]" multiple>
                            <label class="custom-file-label" for="gambar">Choose file</label>
                        </div>
                    </div>
                    <button type="submit" class="float-right p-2 rounded" style="border: none; background-color: rgb(165, 165, 165);"><i class="ti-file"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
<form class="forms-sample" action="{{ route('produk.update', $produk->kd_produk) }}" method="post">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card shadow mb-3 pt-3 px-3 bg-white rounded">
                <div class="card-body col-md-8">
                    <h4 class="card-title">Spesifikasi Produk</h4>
                    {{-- <p class="card-description">
                        {{ $subJudul }}
                    </p> --}}
                    <div class="form-group">
                        <label for="kd_produk">Kode Produk</label>
                        <input type="text" class="form-control form-control-sm" id="kd_produk" name="kd_produk" value="{{ $produk->kd_produk }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nm_produk">Nama Produk</label>
                        <input type="text" class="form-control form-control-sm @error('nm_produk') is-invalid @enderror" id="nm_produk" name="nm_produk" value="{{ old('nm_produk', $produk->nm_produk) }}">
                        @error('nm_produk')
                            <div class="invalid-feedback mt-2 mx-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="kategori">Kategori Produk</label>
                            <select class="form-control form-control-sm @error('kategori') is-invalid @enderror" id="kategori" name="kategori">
                                <option disabled hidden selected>- Silahkan Pilih -</option>
                                @foreach ($kategori as $data)
                                    @if (old('kategori', $produk->kategori) == $data->id_kategori)
                                        <option value="{{ $data->id_kategori }}" selected>{{ $data->nm_kategori }}</option>
                                    @else
                                    <option value="{{ $data->id_kategori }}">{{ $data->nm_kategori }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback mt-2 mx-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="stok">Stok Produk</label>
                            <input type="number" class="form-control form-control-sm @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{ old('stok', $produk->stok) }}">
                            @error('stok')
                                <div class="invalid-feedback mt-2 mx-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="jumlah_produk">Jumlah Produk <span class="px-1 text-gray">*dalam kemasan</span></label>
                            <input type="number" class="form-control form-control-sm @error('jumlah_produk') is-invalid @enderror" id="jumlah_produk" name="jumlah_produk" value="{{ old('jumlah_produk', $produk->jumlah_produk) }}">
                            @error('jumlah_produk')
                                <div class="invalid-feedback mt-2 mx-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="berat_produk">Berat Produk</label>
                            <input type="number" class="form-control form-control-sm @error('berat_produk') is-invalid @enderror" id="berat_produk" name="berat_produk" value="{{ old('berat_produk', $produk->berat_produk) }}">
                            @error('berat_produk')
                                <div class="invalid-feedback mt-2 mx-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="jenis_masakan">Jenis Masakan</label>
                        <input type="text" class="form-control form-control-sm @error('jenis_masakan') is-invalid @enderror" id="jenis_masakan" name="jenis_masakan" value="{{ old('jenis_masakan', $produk->jenis_masakan) }}">
                        @error('jenis_masakan')
                            <div class="invalid-feedback mt-2 mx-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="masa_penyimpanan">Masa Penyimpanan</label>
                        <input type="text" class="form-control form-control-sm @error('masa_penyimpanan') is-invalid @enderror" id="masa_penyimpanan" name="masa_penyimpanan" value="{{ old('masa_penyimpanan', $produk->masa_penyimpanan) }}">
                        @error('masa_penyimpanan')
                            <div class="invalid-feedback mt-2 mx-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="harga">Harga Produk</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-coklat text-white">Rp</span>
                            </div>
                            <input type="number" class="form-control form-control-sm @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga', $produk->harga) }}">
                            <div class="input-group-append">
                                <span class="input-group-text">,00</span>
                            </div>
                            @error('harga')
                                <div class="invalid-feedback mt-2 mx-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="form-group">
                        <label for="ket">Keterangan</label>
                        <textarea class="form-control form-control-sm @error('ket') is-invalid @enderror" id="ket" name="ket" rows="4" placeholder="Masukkan Keterangan">{{ old('ket', $produk->ket) }}</textarea>
                        @error('ket')
                            <div class="invalid-feedback mt-2 mx-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> --}}
                </div>
            </div>
        </div>
        
    </div>
    
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card shadow px-0 mb-5 bg-white rounded">
                <div class="card-body">
                    <h4 class="card-title">Deskripsi</h4>
                    <div class="form-group">
                        @error('ket')
                            <div class="invalid-feedback mt-2 mx-1">
                                {{ $message }}
                            </div>
                        @enderror
                        <input id="ket" type="hidden" name="ket" value="{{ old('ket', $produk->ket) }}">
                        <trix-editor input="ket"></trix-editor>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mx-auto ">
            <button type="submit" class="btn btn-success btn-md btn-block">                     
                    Save
            </button>
            <a href="/produk" class="btn btn-dark btn-md btn-block">Cancel</a>
        </div>
    </div>
</form>
{{-- @livewireScripts --}}
@endsection