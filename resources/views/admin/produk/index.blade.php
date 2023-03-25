@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col-12 col-xl-8 mb-5 mb-xl-4">
        <h3 class="font-weight-bold">{{ $judul }}</h3>
        <h6 class="font-weight-normal mb-0">Mengelola <span class="text-primary">{{ $subJudul }}</span></h6>
    </div>

    {{-- alert untuk menampilkan pesan sukses --}}
    <div class="col-lg-12 mb-1 mb-lg-2">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card shadow px-0 mb-5 bg-white rounded">
            <div class="card-body">
                <div class="col-sm-5 form-group float-sm-right">
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search.." autocomplete="off" name="search" value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-coklat text-coklat btn-icon-text mb-6 float-sm-right mx-2" type="submit">
                                    <i class="icon-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <a href="{{ route('produk.create') }}" class="btn btn-sm btn-coklat text-coklat btn-icon-text mb-2 float-sm mx-2">
                    <i class="ti-plus btn-icon-prepend"></i>                                                    
                    Create New
                </a>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Image</th>
                                <th>Nama Produk</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $prdk)
                            <tr>
                                <td>{{ $produk->firstItem() + $loop->index }}</td>
                                <td> 
                                    @php
                                        $gambars = App\models\GambarProduk::where('kd_produk', $prdk->kd_produk)->get();
                                    @endphp
                                    @foreach ($gambars as $gambar)
                                        <img src="{{ asset('fileGambar/'.$gambar->gambar) }}" style="width: 50px; height: 50px;">
                                    @endforeach
                                </td>
                                <td>{{ $prdk->nm_produk .' - '. Str::ucfirst($prdk->nm_kategori) }}  </td>
                                <td>{{ $prdk->stok }}</td>
                                <td>{{ "Rp ".number_format($prdk->harga) }}</td>
                                <td>
                                    <a href="{{ route('produk.show',$prdk->kd_produk) }}">
                                        <button type="button" class="btn btn-inverse-success btn-rounded btn-icon">
                                            <i class="ti-eye"></i>
                                        </button>
                                    </a>
                                    <a href="{{ route('produk.edit',$prdk->kd_produk) }}">
                                        <button type="button" class="btn btn-inverse-info btn-rounded btn-icon">
                                            <i class="ti-pencil"></i>
                                        </button>
                                    </a>
                                    <form action="{{ route('produk.destroy',$prdk->kd_produk) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-inverse-danger btn-rounded btn-icon" onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                            <i class="ti-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end mt-3">
                        {{ $produk->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection