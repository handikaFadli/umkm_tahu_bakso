@extends('admin.layouts.main')

@section('content')

<form class="forms-sample" action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card shadow px-0 bg-white rounded">
                <div class="card-body">
                    <h4 class="card-title">Gambar Produk</h4>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('gambar') is-invalid @enderror" id="images" name="gambar[]" multiple>
                            @error('gambar')
                                <div class="text-danger mt-5">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label class="custom-file-label" for="images">Choose file</label>
                        </div>
                    </div>
                    <div class="card-img-bottom rounded">
                        <div class="imgPreview" style="width: 10rem;"> </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
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
                        <input type="text" class="form-control form-control-sm" id="kd_produk" name="kd_produk" value="{{ $kodeProduk }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nm_produk">Nama Produk</label>
                        <input type="text" class="form-control form-control-sm @error('nm_produk') is-invalid @enderror" id="nm_produk" name="nm_produk" placeholder="Masukkan Nama Produk" value="{{ old('nm_produk') }}">
                        @error('nm_produk')
                            <div class="invalid-feedback mt-2 mx-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="kategori">Kategori Produk</label>
                            <select class="form-control form-control-sm @error('kategori') border-danger is-invalid @enderror" id="kategori" name="kategori">
                                <option disabled hidden selected>- Silahkan Pilih -</option>
                                @foreach ($kategori as $data)
                                    @if (old('kategori') == $data->id_kategori)
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
                            <input type="number" class="form-control form-control-sm @error('stok') is-invalid @enderror" id="stok" name="stok" placeholder="Masukkan Stok Produk" value="{{ old('stok') }}">
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
                            <input type="number" class="form-control form-control-sm @error('jumlah_produk') is-invalid @enderror" id="jumlah_produk" name="jumlah_produk" placeholder="Masukkan Jumlah Produk" value="{{ old('jumlah_produk') }}">
                            @error('jumlah_produk')
                                <div class="invalid-feedback mt-2 mx-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="berat_produk">Berat Produk</label>
                            <input type="number" class="form-control form-control-sm @error('berat_produk') is-invalid @enderror" id="berat_produk" name="berat_produk" placeholder="Masukkan Berat Produk" value="{{ old('berat_produk') }}">
                            @error('berat_produk')
                                <div class="invalid-feedback mt-2 mx-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="jenis_masakan">Jenis Masakan</label>
                        <input type="text" class="form-control form-control-sm @error('jenis_masakan') is-invalid @enderror" id="jenis_masakan" name="jenis_masakan" placeholder="Masukkan Jenis Masakan" value="{{ old('jenis_masakan') }}">
                        @error('jenis_masakan')
                            <div class="invalid-feedback mt-2 mx-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="masa_penyimpanan">Masa Penyimpanan</label>
                        <input type="text" class="form-control form-control-sm @error('masa_penyimpanan') is-invalid @enderror" id="masa_penyimpanan" name="masa_penyimpanan" placeholder="Masukkan Jenis Masakan" value="{{ old('masa_penyimpanan') }}">
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
                            <input type="number" class="form-control form-control-sm @error('harga') is-invalid @enderror" id="harga" name="harga" placeholder="Masukkan Harga Produk" value="{{ old('harga') }}">
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
                    
                </div>
            </div>
        </div>
        {{-- <div class="col-md-5 grid-margin stretch-card">
            <div class="card shadow px-0 mb-3 bg-white rounded">
                <div class="card-body">
                    <h4 class="card-title">Upload Image</h4>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/*" onchange="document.getElementById('output', {{ old('gambar') }}).src = window.URL.createObjectURL(this.files[0])" >
                            @error('gambar')
                                <div class="invalid-feedback mt-2 mx-1">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label class="custom-file-label" for="gambar">Choose file</label>
                        </div>
                    </div>
                    <img src="" class="card-img-bottom rounded" id="output" style="width: 10rem;">
                </div>
            </div>
        </div> --}}
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card shadow px-0 mb-5 bg-white rounded">
                <div class="card-body">
                    <div class="form-group">
                        <label for="ket" class="form-label">Deskripsi Produk</label>
                        
                        <input id="ket" type="hidden" name="ket" value="{{ old('ket') }}">
                        <trix-editor input="ket"></trix-editor>
                        @error('ket')
                            <div class="text-danger mt-2 mx-1">
                                {{ $message }}
                            </div>
                        @enderror
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
            <a href="/produk" class="btn btn-light btn-md btn-block">Cancel</a>
        </div>
    </div>
    
</form>

<script>
    document.addEventListener('trix-file-accept', function(e){
            e.preventDefault();
        })
</script>
{{-- <script>
    $(function() {
        // Multiple images preview with JavaScript
        var multiImgPreview = function(input, imgPreviewPlaceholder) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('#images').on('change', function() {
            multiImgPreview(this, 'div.imgPreview');
        });
    });    
</script> --}}


@endsection