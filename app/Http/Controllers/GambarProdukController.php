<?php

namespace App\Http\Controllers;

use App\Models\GambarProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GambarProdukController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
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

        return back()->with('success', 'Image updated successfuly.');
    }

    public function destroy($id)
    {
        $gambar = GambarProduk::find($id);
        File::delete('fileGambar/' . $gambar->gambar);

        $gambar->delete();

        return back();
    }
}
