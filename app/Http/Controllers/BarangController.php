<?php

namespace App\Http\Controllers;

use App\Exports\BarangExport;
use App\Models\Barang;
use App\Models\Cash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::orderBy('id', 'DESC')->get();
        $transaksi = Cash::orderBy('id', 'DESC')->get()->pluck('nama', 'id');

        // $stok = 0;
        // foreach ($transaksi as $t) {
        //     $stok += ($t->jmlmasuk);
        // }

        return view('barang.barang', compact('barang', 'transaksi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jmlbarang' => 'required',
            'harga' => 'required',
        ]);

        Barang::create([
            'nama' => $request->nama,
            // 'jenis' => $request->jenis,
            'jmlbarang' => $request->jmlbarang,
            'harga' => $request->harga,
        ]);

        $cash = Cash::find($request->cash_id);
        $cash->jmlmasuk + $request->jmlbarang;
        $cash->save;

        return redirect()->route('barang');
    }

    public function show(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
        ]);

        $barang = Barang::find($request->barang_id);
        if (Auth::user()) {
            return response([
                'nama_petugas' => Auth::user()->name,
                'barang_id' => $barang->id,
                'nama_barang' => $barang->nama,
            ], 200);
        } else {
            $cash = Cash::where('barang_id', $request->barang_id)->orderBy('id', 'DESC')->first();
            return response([
                'nama_barang' => $barang->nama,
                'jmlbarang' => $cash->jmlmasuk,
                'harga' => $barang->harga,
                'total' => $cash->total,
            ], 200);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jmlbarang' => 'required',
            'harga' => 'required',
        ]);

        $barang = Barang::find($id);
        $barang->update([
            'nama' => $request->nama,
            'jmlbarang' => $request->jmlbarang,
            'harga' => $request->harga,
        ]);

        return redirect()->route('barang');
    }

    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        return redirect()->route('barang');
    }

    public function export()
    {
        return Excel::download(new BarangExport, 'dataBarang.xlsx');
    }
}
