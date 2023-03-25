<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $lapPenjualan = Penjualan::select(DB::raw("sum(total) as total"), DB::raw("monthname(created_at) as month"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw('Month(created_at)'), DB::raw('monthname(created_at)'))
            ->pluck('total', 'month');

        $jumlah = $lapPenjualan->values();
        $labels = $lapPenjualan->keys();

        return view('admin.dashboard', compact('jumlah', 'labels'));
    }
}
