@extends('admin.layouts.main')

@section('content')

<form class="forms-sample" action="{{ route('penjualan.update', $data->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-7 grid-margin stretch-card">
            <div class="card shadow mb-3 pt-3 px-3 bg-white rounded">
                <div class="card-body col-md-12">
                    <div class="form-group">
                        <label for="nm_customer">Nama Customer</label>
                        <input type="text" class="form-control form-control-sm @error('nm_customer') is-invalid @enderror" id="nm_customer" name="nm_customer" value="{{ old('nm_customer', $data->nm_customer) }}">
                        @error('nm_customer')
                            <div class="invalid-feedback mt-2 mx-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="no_hp">Nomor HP</label>
                        <input type="number" class="form-control form-control-sm @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp', $data->no_hp) }}">
                        @error('no_hp')
                            <div class="invalid-feedback mt-2 mx-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control form-control-sm @error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{ old('alamat', $data->alamat) }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback mt-2 mx-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="pembayaran">Pembayaran</label>
                        <select class="form-control form-control-sm @error('pembayaran') border-danger is-invalid @enderror" id="pembayaran" name="pembayaran">
                            @if (old('pembayaran', $data->pembayaran) == $data->pembayaran)
                            <option value="{{ $data->pembayaran }}" hidden selected>{{ $data->pembayaran }}</option>
                            @else
                            <option value="{{ $data->pembayaran }}" hidden selected>{{ $data->pembayaran }}</option>
                            @endif
                            <option value="Cash">Cash</option>
                            <option value="Bank BJB">Bank BJB</option>
                            <option value="Shopeepay">Shopeepay</option>
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
                            @if (old('pengiriman', $data->pengiriman) == $data->pengiriman)
                            <option value="{{ $data->pengiriman }}" hidden selected>{{ $data->pengiriman }}</option>
                            @else
                            <option value="{{ $data->pengiriman }}" hidden selected>{{ $data->pengiriman }}</option>
                            @endif
                            <option value="COD">COD</option>
                            <option value="Pick Up">Pick Up</option>
                            <option value="Diantar">Diantar</option>
                        </select>
                        @error('pengiriman')
                            <div class="invalid-feedback mt-2 mx-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    

                    <button type="submit" class="btn btn-success mr-2">Save</button>
                    <a href="/penjualan" class="btn btn-light">Cancel</a>
                    
                </div>
            </div>
        </div>
    </div>
    
</form>



@endsection