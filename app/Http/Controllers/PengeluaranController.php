<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pengeluaran;
use App\Models\User;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluaran = Pengeluaran::orderBy('id', 'DESC')->get();
        $barang = Barang::orderBy('id', 'DESC')->get();
        $users = User::orderBy('id', 'DESC')->get();


        $total_pengeluaran = 0;
        foreach ($pengeluaran as  $p) {
            $total_pengeluaran += ($p->harga * $p->qt);
        }

        return view(
            'pengeluaran.pengeluaran',
            compact(
                'pengeluaran',
                'barang',
                'users',
                'total_pengeluaran',
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_user' => 'required',
            'nama_barang' => 'required',
            'qt' => 'required',
            'harga' => 'required',
        ]);

        Pengeluaran::create([
            'nama_user' => $request->nama_user,
            'nama_barang' => $request->nama_barang,
            'qt' => $request->qt,
            'harga' => $request->harga,
        ]);

        return redirect()->route('pengeluaran');
    }

    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->delete();
        return redirect()->route('pengeluaran');
    }
}
