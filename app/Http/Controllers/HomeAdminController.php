<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeAdminController extends Controller
{
    public function index()
    {
        $produk = DB::table('produk')
            ->join('kategori', 'produk.kategori', '=', 'kategori.id_kategori')->get();

        return view('home', compact('produk'));
    }
}
