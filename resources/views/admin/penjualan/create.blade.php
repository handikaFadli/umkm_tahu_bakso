@extends('admin.layouts.main')

@section('content')

<form class="forms-sample" action="{{ route('penjualan.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-7 grid-margin stretch-card">
            <div class="card shadow mb-3 pt-3 px-3 bg-white rounded">
                <div class="card-body col-md-12">
                    <div class="form-group">
                        <label for="nm_customer">Nama Customer</label>
                        <input type="text" class="form-control form-control-sm @error('nm_customer') is-invalid @enderror" id="nm_customer" name="nm_customer" placeholder="Masukkan Nama Customer" value="{{ old('nm_customer') }}">
                        @error('nm_customer')
                            <div class="invalid-feedback mt-2 mx-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="no_hp">Nomor Handphone</label>
                        <input type="number" class="form-control form-control-sm @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" placeholder="Masukkan Nomor Handphone" value="{{ old('no_hp') }}">
                        @error('no_hp')
                            <div class="invalid-feedback mt-2 mx-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control form-control-sm @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Masukkan Alamat">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback mt-2 mx-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="pembayaran">Pembayaran</label>
                        <select class="form-control form-control-sm @error('pembayaran') border-danger is-invalid @enderror" id="pembayaran" name="pembayaran">
                            <option disabled hidden selected>- Silahkan Pilih -</option>
                            @if (old('pembayaran') == "Cash")
                            <option value="Cash" selected>Cash</option>
                            @elseif (old('pembayaran') == "Bank BJB")
                            <option value="Bank BJB" selected>Bank BJB</option>
                            @elseif (old('pembayaran') == "Shopeepay")
                            <option value="Shopeepay" selected>Shopeepay</option>
                            @else
                            <option value="Cash">Cash</option>
                            <option value="Bank BJB">Bank BJB</option>
                            <option value="Shopeepay">Shopeepay</option>
                            @endif
                        </select>
                        @error('pembayaran')
                            <div class="invalid-feedback mt-2 mx-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="pengiriman">Pengiriman</label>
                        <select class="form-control form-control-sm @error('pengiriman') border-danger is-invalid @enderror" id="pengiriman" name="pengiriman">
                            <option disabled hidden selected>- Silahkan Pilih -</option>
                            @if (old('pengiriman') == "COD")
                            <option value="COD" selected>COD</option>
                            @elseif (old('pengiriman') == "Pick Up")
                            <option value="Pick Up" selected>Pick Up</option>
                            @elseif (old('pengiriman') == "Diantar")
                            <option value="Diantar" selected>Diantar</option>
                            @else
                            <option value="COD">COD</option>
                            <option value="Pick Up">Pick Up</option>
                            <option value="Diantar">Diantar</option>
                            @endif
                        </select>
                        @error('pengiriman')
                            <div class="invalid-feedback mt-2 mx-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                        
                    <div class="row mb-4">
                        <label for="produk" class="col-md-12">Produk</label>
                        @foreach ($produk as $p)
                        <div class="col-md-5 mb-2">
                            <div class="form-check form-check-flat form-check-primary">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="produk_id[]" value="{{ $p->kd_produk }}">
                                {{ $p->nm_produk.' '.$p->nm_kategori }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-7 mb-2">
                            <input type="number" class="form-control form-control-sm col-3" name="jumlah[]">
                            <input type="hidden" name="kd_produk[]" value="{{ $p->kd_produk }}">
                        </div>
                        @endforeach
                    </div>

                    

                    <button type="submit" class="btn btn-success mr-2">Save</button>
                    <a href="/penjualan" class="btn btn-light">Cancel</a>
                    
                </div>
            </div>
        </div>
    </div>
    
</form>



@endsection