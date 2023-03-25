<?php

namespace App\Http\Livewire\Produk;

use Livewire\Component;

class EditProduk extends Component
{
    public function render()
    {
        return view('livewire.produk.edit-produk');
    }

    public function hapusProduk()
    {
        dd('hai');
    }
}
