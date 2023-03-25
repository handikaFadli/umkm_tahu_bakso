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
                <a href="{{ route('penjualan.create') }}" class="btn btn-sm btn-coklat text-coklat btn-icon-text mb-2 float-sm mx-2">
                    <i class="ti-plus btn-icon-prepend"></i>                                                    
                    Create New
                </a>
                <a href="/print_penjualan" target="_blank" class="btn btn-sm btn-coklat text-coklat btn-icon-text mb-2 float-sm mx-2">
                    <i class="ti-printer btn-icon-prepend mx-auto"></i>
                </a>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Customer</th>
                                <th>Produk</th>
                                <th>Nomor HP</th>
                                <th>Alamat</th>
                                <th>Tanggal</th>
                                <th>Pembayaran</th>
                                <th>Pengiriman</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penjualan as $pen)
                            <tr>
                                <td>{{ $penjualan->firstItem() + $loop->index }}</td>
                                <td>{{ $pen->nm_customer }}</td>
                                <td>
                                    <a href="javascript:;" data-toggle="modal" data-target="#detailProduk{{ $pen->id }}">
                                        Detail <i class="ti-arrow-circle-up "></i>
                                    </a>
                                </td>
                                <td>{{ $pen->no_hp }}</td>
                                <td>{{ $pen->alamat }}</td>
                                @php
                                    $bulanIndo = [
                                    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                                    ];

                                    $tanggal = date('j', strtotime($pen->created_at));
                                    $bulan = $bulanIndo[date('n', strtotime($pen->created_at)) - 1];
                                    $tahun = date('Y', strtotime($pen->created_at));
                                @endphp
                                <td>{{ $tanggal }} {{ $bulan }} {{ $tahun }}</td>
                                <td>{{ $pen->pembayaran }}</td>
                                <td>{{ $pen->pengiriman }}</td>
                                <td>{{ "Rp ".number_format($pen->total) }}</td>
                                <td>
                                    <a href="{{ route('penjualan.edit',$pen->id) }}">
                                        <button type="button" class="btn btn-inverse-info btn-rounded btn-icon">
                                            <i class="ti-pencil"></i>
                                        </button>
                                    </a>
                                    <form action="{{ route('penjualan.destroy',$pen->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-inverse-danger btn-rounded btn-icon" onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                            <i class="ti-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <tfoot>
                                <tr>
                                    <th colspan="8" class="text-center">Total</th>
                                    <th>{{ 'Rp. ' . number_format($penjualan->sum('total')) }}</th>
                                </tr>
                            </tfoot>
                            
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end mt-3">
                        {{ $penjualan->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($penjualan as $dt)

<!-- Modal -->
<div class="modal fade" id="detailProduk{{ $dt->id }}" tabindex="-1" aria-labelledby="detailProdukLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="detailProdukLabel">Detail Produk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @php
                    $produk = App\models\PenjualanDetail::join('produk', 'penjualan_detail.produk_id', '=', 'produk.kd_produk')
                    ->select('produk.kd_produk', 'produk.harga', 'penjualan_detail.jumlah', 'penjualan_detail.produk_id')
                    ->where('penjualan_detail.penjualan_id', '=', $dt->id)->get();
                @endphp
                <table class="table">
                    <tr>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                    </tr>
                    @foreach ($produk as $p)
                    @if ($p->kd_produk == 'PRDK-001')
                    <tr>
                        <td>Tahu Bakso Original</td>
                        <td>{{ $p->jumlah }}</td>
                        <td>{{ $p->harga }}</td>
                    </tr>
                    @elseif($p->kd_produk == 'PRDK-002')
                    <tr>
                        <td>Tahu Bakso Rawit</td>
                        <td>{{ $p->jumlah }}</td>
                        <td>{{ $p->harga }}</td>
                    </tr>
                    @else
                    <tr>
                        <td>Tahu Bakso Mix</td>
                        <td>{{ $p->jumlah }}</td>
                        <td>{{ $p->harga }}</td>

                    </tr>
                    @endif
                    @endforeach
                </table>

               
            </div>
        </div>
    </div>
</div>
    
@endforeach
@endsection