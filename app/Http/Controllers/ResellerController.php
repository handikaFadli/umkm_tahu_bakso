<?php

namespace App\Http\Controllers;

use App\Models\Reseller;
use Illuminate\Http\Request;

class ResellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = $request->search;

        $reseller = Reseller::where('no_reseller', 'LIKE', '%' . $search . '%')
            ->orWhere('nm_reseller', 'LIKE', '%' . $search . '%')
            ->orWhere('no_hp', 'LIKE', '%' . $search . '%')
            ->orWhere('alamat', 'LIKE', '%' . $search . '%')
            ->oldest()->paginate(10)->withQueryString();

        return view(
            'admin.reseller.index',
            [
                'reseller' => $reseller,
                'judul' => 'Data Reseller',
                'subJudul' => 'data reseller'
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
        $kodeR = Reseller::max('no_reseller');
        $kodeR = (int) substr($kodeR, 3, 3);
        $kodeR = $kodeR + 1;
        $noRes = "RS" . sprintf("%03s", $kodeR);


        return view(
            'admin.reseller.create',
            [
                'noRes' => $noRes,
                'judul' => 'Tambah Data Reseller',
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
            'no_reseller' => 'required|max:11',
            'nm_reseller' => 'required',
            'no_hp' => 'required|min:11|max:12',
            'alamat' => 'required|min:3',
        ]);

        $input = $request->all();
        $input['no_hp'] = '+62' . $input['no_hp'];

        Reseller::create($input);
        return redirect()->route('reseller.index')
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
    public function edit(Reseller $reseller)
    {
        // memisahkan nomor telepon
        $dataNoTelp = explode('+62', $reseller->no_hp);
        $noTelp = $dataNoTelp[1];

        return view(
            'admin.reseller.edit',
            [
                'reseller' => $reseller,
                'no_hp' => $noTelp,
                'judul' => 'Edit Data Reseller',
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
    public function update(Request $request, Reseller $reseller)
    {
        $request->validate([
            'no_reseller' => 'required|max:11',
            'nm_reseller' => 'required',
            'no_hp' => 'required|min:11|max:12',
            'alamat' => 'required|min:3',
        ]);

        $input = $request->all();
        $input['no_hp'] = '+62' . $input['no_hp'];

        $reseller->update($input);
        return redirect()->route('reseller.index')
            ->with('success', 'Data updated successfuly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reseller $reseller)
    {
        $reseller->delete();

        return redirect()->route('reseller.index')
            ->with('success', 'Data deleted successfuly.');
    }

    public function print()
    {
        $data = Reseller::oldest()->get();

        return view('admin.reseller.laporan', ['data' => $data]);
    }
}
