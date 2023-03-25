<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{

    public function index()
    {
        $kategori = Kategori::oldest()->paginate(10);

        return view(
            'admin.kategori.index',
            [
                'kategori' => $kategori,
                'judul' => 'Data Kategori Produk',
                'subJudul' => 'data kategori produk'
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
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'nm_kategori' => 'required|unique:kategori,nm_kategori',
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategori.index')
            ->with('success', 'Data created successfuly.');
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
    public function edit($id)
    {
        //
    }

    public function update(Request $request, Kategori $kategori)
    {
        $rules = [
            'nm_kategori' => 'required'
        ];

        if ($request->nm_karyawan != $kategori->nm_karyawan) {
            $rules['nm_kategori'] = 'required|unique:kategori,nm_kategori';
        };

        $input = $request->validate($rules);

        $kategori->update($input);

        return redirect()->route('kategori.index')
            ->with('success', 'Data updated successfuly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index')
            ->with('success', 'Data deleted successfuly.');
    }
}
