@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col-12 col-xl-8 mb-5 mb-xl-4">
        <h3 class="font-weight-bold">{{ $judul }}</h3>
        <h6 class="font-weight-normal mb-0">Mengelola <span class="text-primary">{{ $subJudul }}</span></h6>
    </div>

    {{-- alert untuk menampilkan pesan sukses --}}
    <div class="col-lg-10 mb-1 mb-lg-2">
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
    <div class="col-lg-10 col-lg-6 mb-1 mb-lg-2">
        @error('nm_kategori')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror
    </div>

    <div class="col-lg-10 grid-margin stretch-card">
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
                <a href="{{ route('reseller.create') }}" class="btn btn-sm btn-coklat text-coklat btn-icon-text mb-2 float-sm mx-2">
                    <i class="ti-plus btn-icon-prepend"></i>                                                    
                    Create New
                </a>
                <a href="/print_reseller" target="_blank" class="btn btn-sm btn-coklat text-coklat btn-icon-text mb-2 float-sm mx-2">
                    <i class="ti-printer btn-icon-prepend mx-auto"></i>
                </a>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>No Reseller</th>
                                <th>Nama Reseller</th>
                                <th>No Handphone</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reseller as $rs)
                            
                            <tr>
                                <td>{{ $reseller->firstItem() + $loop->index }}</td>
                                <td>{{ $rs->no_reseller }}</td>
                                <td>{{ $rs->nm_reseller }}</td>
                                <td>{{ $rs->no_hp }}</td>
                                <td>{{ $rs->alamat }}</td>
                                <td>
                                    <a href="{{ route('reseller.edit',$rs->id_reseller) }}">
                                        <button type="button" class="btn btn-inverse-info btn-rounded btn-icon">
                                            <i class="ti-pencil"></i>
                                        </button>
                                    </a>
                                    <form action="{{ route('reseller.destroy',$rs->id_reseller) }}" method="POST" class="d-inline">
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
                        {{ $reseller->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection