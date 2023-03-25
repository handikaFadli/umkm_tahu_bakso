<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Kategori;
use App\Models\PenjualanDetail;
use App\Models\Produk;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $pen = Penjualan::where('penjualan.nm_customer', 'LIKE', '%' . $search . '%')
            ->orWhere('penjualan.no_hp', 'LIKE', '%' . $search . '%')
            ->orWhere('penjualan.alamat', 'LIKE', '%' . $search . '%')
            ->orWhere('penjualan.pembayaran', 'LIKE', '%' . $search . '%')
            ->orWhere('penjualan.pengiriman', 'LIKE', '%' . $search . '%')
            ->oldest()->paginate(10)->withQueryString();

        return view(
            'admin.penjualan.index',
            [
                'penjualan' => $pen,
                'judul' => 'Data Penjualan',
                'subJudul' => 'data penjualan'
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::join('kategori', 'produk.kategori', '=', 'kategori.id_kategori')
            ->select('produk.*', 'kategori.nm_kategori', 'kategori.id_kategori')->get();

        return view(
            'admin.penjualan.create',
            [
                'produk' => $produk,
                'judul' => 'Tambah Data Penjualan',
                'subJudul' => 'Silahkan isi dengan benar!'
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nm_customer' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'pembayaran' => 'required',
            'pengiriman' => 'required',
        ]);

        // $jml = array_filter($request->jumlah);
        // $jml = array_values($jml);

        // $jmlh = array_map('intval', $jml);

        // $jml = array_intersect_key($jml, $request->kd_produk);
        // $kd_produk = array_intersect_key($request->kd_produk, $jmlh);

        // $kode = array_combine($kd_produk, $jml);

        $jumlah = array_filter($request->jumlah);
        $jumlah = array_values($jumlah);

        $jumlahA = array_map('intval', $jumlah);

        $jumlah = array_intersect_key($jumlah, $request->produk_id);
        $produk_id = array_intersect_key($request->produk_id, $jumlahA);

        $data = array_combine($produk_id, $jumlah);

        $pen = new Penjualan();
        $pen->nm_customer = $request->nm_customer;
        $pen->no_hp = $request->no_hp;
        $pen->alamat = $request->alamat;
        $pen->pembayaran = $request->pembayaran;
        $pen->pengiriman = $request->pengiriman;
        $pen->total = 0;
        $pen->save();

        foreach ($data as $key => $value) {

            $detail = new PenjualanDetail();
            $detail->penjualan_id = $pen->id;
            $detail->produk_id = $key;
            $detail->jumlah = $value;

            $prdkHrg = Produk::find($key)->harga;
            $harga = $prdkHrg * $value;
            $detail->harga = $harga;

            $detail->save();

            $stok = Produk::find($key);
            $stok->stok = $stok->stok - $detail->jumlah;
            $stok->update();



            $pen->total = $detail->sum('harga');
            $pen->update();
        }

        // $jumlah = array_filter($request->jumlah);
        // $jumlah = array_values($jumlah);

        // $jumlahA = array_map('intval', $jumlah);

        // $jumlah = array_intersect_key($jumlah, $request->produk_id);
        // $produk_id = array_intersect_key($request->produk_id, $jumlahA);

        // $data = array_combine($produk_id, $jumlah);

        // foreach ($data as $key => $value) {
        //     $detail->harga = $key;
        //     $detail->update();
        // }

        return redirect('/penjualan')->with('success', 'Data created successfuly.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $penjualan)
    {
        return view(
            'admin.penjualan.edit',
            [
                'data' => $penjualan,
                'judul' => 'Edit Data Penjualan',
                'subJudul' => 'Silahkan isi dengan benar!'
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        $request->validate([
            'nm_customer' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'pembayaran' => 'required',
            'pengiriman' => 'required',

        ]);

        $input = $request->all();

        $penjualan->update($input);

        return redirect()->route('penjualan.index')
            ->with('success', 'Data updated successfuly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        $detail = PenjualanDetail::where('penjualan_id', $penjualan->id)->get();

        foreach ($detail as $dt) {
            $dt->delete();
        }

        $penjualan->delete();

        return redirect()->route('penjualan.index')
            ->with('success', 'Data deleted successfuly.');
    }

    public function print()
    {
        $data = Penjualan::oldest()->get();

        return view('admin.penjualan.laporan', ['data' => $data]);
    }
}
