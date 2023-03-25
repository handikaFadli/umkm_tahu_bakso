<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\GambarProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopAdminController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $produk = Produk::join('kategori', 'produk.kategori', '=', 'kategori.id_kategori')
            ->select('produk.*', 'kategori.nm_kategori')
            ->where('produk.nm_produk', 'LIKE', '%' . $search . '%')
            ->where('kategori.nm_kategori', 'LIKE', '%' . $search . '%')
            ->where('produk.harga', 'LIKE', '%' . $search . '%')->get();

        return view('shop', compact('produk'));
    }

    public function show(Produk $produk)
    {
        $produk = DB::table('produk')
            ->join('kategori', 'produk.kategori', '=', 'kategori.id_kategori')
            ->select('produk.*', 'kategori.nm_kategori')
            ->where('kd_produk', $produk->kd_produk)->first();

        $gambar = GambarProduk::where('kd_produk', $produk->kd_produk)->get();


        return view('shop-detail', compact('produk'));
    }
}
