@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col-12 col-xl-8 mb-5 mb-xl-4">
        <h3 class="font-weight-bold">{{ $judul }}</h3>
        <h6 class="font-weight-normal mb-0">Mengelola <span class="text-primary">{{ $subJudul }}</span></h6>
    </div>

    {{-- alert untuk menampilkan pesan sukses --}}
    <div class="col-lg-7 mb-1 mb-lg-2">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    {{-- alert untuk menampilkan eror --}}
    <div class="col-lg-7 col-lg-6 mb-1 mb-lg-2">
        @error('nm_kategori')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
    </div>

    <div class="col-lg-7 grid-margin stretch-card">
        <div class="card shadow px-0 mb-5 bg-white rounded">
            <div class="card-body">
                {{-- <h4 class="card-title">Data Produk</h4>
                <p class="card-description">
                    Add class <code>.table-striped</code>
                </p> --}}
                <button type="button" class="btn btn-sm btn-coklat text-coklat btn-icon-text mb-2 float-sm-right mx-2" data-toggle="modal" data-target="#tambahData">
                    <i class="ti-plus btn-icon-prepend"></i> New
                </button>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $ktgr)
                            
                            <tr>
                                <td>{{ $kategori->firstItem() + $loop->index }}</td>
                                <td>{{ $ktgr->nm_kategori }}</td>
                                <td>
                                    <button type="button" class="btn btn-inverse-info btn-rounded btn-icon" data-toggle="modal" data-target="#edit-{{ $ktgr->id_kategori }}">
                                        <i class="ti-pencil"></i>
                                    </button>
                                    <form action="{{ route('kategori.destroy',$ktgr->id_kategori) }}" method="POST" class="d-inline">
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
                </div>
            </div>
        </div>
    </div>
</div>

<!-- include modal tambah -->
@include('admin.kategori.create')

<!-- include modal edit -->
@foreach ($kategori as $ktgr)
    @include('admin.kategori.edit')
@endforeach


@endsection