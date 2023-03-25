<?php

namespace App\Http\Controllers;

use App\Models\GambarProduk;
use App\Models\Kategori;
use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{

    public function index(Request $request)
    {

        $search = $request->search;

        $produk = Produk::join('kategori', 'produk.kategori', '=', 'kategori.id_kategori')
            ->select('produk.*', 'kategori.nm_kategori')
            ->where('produk.nm_produk', 'LIKE', '%' . $search . '%')
            ->orWhere('kategori.nm_kategori', 'LIKE', '%' . $search . '%')
            ->orWhere('produk.harga', 'LIKE', '%' . $search . '%')
            ->orWhere('produk.stok', 'LIKE', '%' . $search . '%')->oldest()->paginate(10)->withQueryString();

        // $gambarProduk = GambarProduk::join('produk', 'gambar_produks.kd_produk', '=', 'produk.kd_produk')
        //     ->select('gambar_produks.gambar')
        //     ->where('gambar_produks.kd_produk', 'produk.kd_produk')->get();

        // dd($gambarProduk);

        return view(
            'admin.produk.index',
            [
                'produk' => $produk,
                'judul' => 'Data Produk',
                'subJudul' => 'data produk'
            ]
        );
    }


    public function create()
    {
        $kode = Produk::max('kd_produk');
        $kode = (int) substr($kode, 5, 3);
        $kode = $kode + 1;
        $kodeProduk = "PRDK-" . sprintf("%03s", $kode);


        return view(
            'admin.produk.create',
            [
                'kategori' => Kategori::all(),
                'kodeProduk' => $kodeProduk,
                'judul' => 'Tambah Data Produk',
                'subJudul' => 'Silahkan isi dengan benar!'
            ]
        );
    }


    public function store(Request $request)
    {
        $request->validate([
            'kd_produk' => 'required',
            'nm_produk' => 'required|min:3|max:99',
            'kategori' => 'required',
            'stok' => 'required|integer',
            'jenis_masakan' => 'required|min:3|max:99',
            'jumlah_produk' => 'required',
            'berat_produk' => 'required',
            'masa_penyimpanan' => 'required|min:3|max:99',
            'harga' => 'required|numeric',
            'ket' => 'required|min:3',
            'gambar' => 'required',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp'
        ]);

        if ($images = $request->file('gambar')) {
            foreach ($images as $image) {
                $pimage = new GambarProduk();
                $pimage->kd_produk = $request->kd_produk;

                $imageName = round(microtime(true) * 1000) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('fileGambar'), $imageName);
                $pimage->gambar = $imageName;

                $pimage->save();
            }
        }

        // if ($request->hasfile('gambar')) {
        //     $files = [];
        //     foreach ($request->file('gambar') as $file) {
        //         if ($file->isValid()) {
        //             $gambar = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $file->getClientOriginalName());
        //             $file->move(public_path('images'), $gambar);
        //             $files[] = [
        //                 'gambar' => $gambar,
        //             ];
        //         }
        //     }
        // }

        // if ($image = $request->file('gambar')) {
        //     foreach ($image as $img) {
        //         $destinationPath = 'fileGambar/';
        //         $profileImage = date('YmdHis') . "." . $img->getClientOriginalExtension();
        //         $img->move($destinationPath, $profileImage);
        //         $imgData[] = $profileImage;
        //     }
        // }

        // if ($image = $request->file('gambar')) {
        //     $destinationPath = 'fileGambar/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $input['gambar'] = "$profileImage";
        // }

        Produk::create([
            'kd_produk' => $request->kd_produk,
            'nm_produk' => $request->nm_produk,
            'kategori' => $request->kategori,
            'stok' => $request->stok,
            'jenis_masakan' => $request->jenis_masakan,
            'jumlah_produk' => $request->jumlah_produk,
            'berat_produk' => $request->berat_produk,
            'masa_penyimpanan' => $request->masa_penyimpanan,
            'harga' => $request->harga,
            'ket' => $request->ket
        ]);
        return redirect()->route('produk.index')
            ->with('success', 'Data created successfuly.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {

        $produk = DB::table('produk')
            ->join('kategori', 'produk.kategori', '=', 'kategori.id_kategori')
            ->select('produk.*', 'kategori.nm_kategori')
            ->where('kd_produk', $produk->kd_produk)->first();

        $gambar = GambarProduk::join('produk', 'gambar_produks.kd_produk', '=', 'produk.kd_produk')
            ->select('gambar_produks.gambar')
            ->where('gambar_produks.kd_produk', $produk->kd_produk)->get();

        return view('admin.produk.show', compact('produk', 'gambar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {

        $produks = DB::table('produk')
            ->join('kategori', 'produk.kategori', '=', 'kategori.id_kategori')
            ->select('produk.*', 'kategori.nm_kategori')
            ->where('kd_produk', $produk->kd_produk)->first();

        $gambar = GambarProduk::where('kd_produk', $produk->kd_produk)->get();

        // dd($gambar);

        return view('admin.produk.edit', [
            'produk' => $produks,
            'gambar' => $gambar,
            'kategori' => Kategori::all(),
            'judul' => 'Edit Data Produk',
            'subJudul' => 'Silahkan isi dengan benar!'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {

        $request->validate([
            'kd_produk' => 'required',
            'nm_produk' => 'required|min:3|max:99',
            'kategori' => 'required',
            'stok' => 'required|integer',
            'jenis_masakan' => 'required|min:3|max:99',
            'jumlah_produk' => 'required',
            'berat_produk' => 'required',
            'masa_penyimpanan' => 'required|min:3|max:99',
            'harga' => 'required|numeric',
            'ket' => 'required|min:3'
        ]);

        $input = $request->all();

        $produk->update($input);

        return redirect()->route('produk.index')
            ->with('success', 'Data updated successfuly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $gambar = GambarProduk::where('kd_produk', $produk->kd_produk)->get();

        foreach ($gambar as $gmbr) {
            File::delete('fileGambar/' . $gmbr->gambar);
            $gmbr->delete();
        }

        $produk->delete();

        return redirect()->route('produk.index')
            ->with('success', 'Data deleted successfuly.');
    }
}
