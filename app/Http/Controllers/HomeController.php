<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Cash;
use App\Models\Pengeluaran;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $pelanggan = User::where('role', 'pelanggan')->count();
        $barang = Cash::orderBy('id', 'desc')->count();


        $masuk = Cash::orderBy('id', 'DESC')->get();
        $keluar = Pengeluaran::orderBy('id', 'DESC')->get();

        $total_pemasukan = 0;
        foreach ($masuk as  $t) {
            $total_pemasukan += ($t->harga * $t->jmlmasuk);
        }

        $total_pengeluaran = 0;
        foreach ($keluar as  $p) {
            $total_pengeluaran += ($p->harga * $p->qt);
        }

        return view(
            'beranda',
            compact(
                'pelanggan',
                'barang',
                'total_pemasukan',
                'total_pengeluaran',
            )
        );
    }
}