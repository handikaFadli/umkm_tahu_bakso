@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-7 grid-margin stretch-card">
            <div class="card shadow px-0 mb-3 bg-white rounded">
                <div class="card-body col-md-10">
                    <h4 class="card-title">{{ $judul }}</h4>
                    <p class="card-description">
                        {{ $subJudul }}
                    </p>
                    <form class="forms-sample mt-4" action="{{ route('reseller.update', $reseller->id_reseller) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="no_reseller">Nomor Reseller</label>
                            <input type="text" class="form-control form-control-sm" id="no_reseller" name="no_reseller" value="{{ $reseller->no_reseller }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="nm_reseller">Nama Reseller</label>
                            <input type="text" class="form-control form-control-sm @error('nm_reseller') is-invalid @enderror" id="nm_reseller" name="nm_reseller" value="{{ old('nm_reseller', $reseller->nm_reseller) }}">
                            @error('nm_reseller')
                                <div class="invalid-feedback mt-2 mx-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="no_hp">Nomor Handphone</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-coklat text-white">+62</span>
                                </div>
                                <input type="number" class="form-control form-control-sm @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp', $no_hp) }}">
                                @error('no_hp')
                                    <div class="invalid-feedback mt-2 mx-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-5">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="4">{{ old('alamat', $reseller->alamat) }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback mt-2 mx-1">
                                        {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-success mr-2">Save</button>
                        <a href="/reseller" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection