<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Cash;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CashController extends Controller
{
    public function index()
    {
        $transaksi = Cash::orderBy('id', 'DESC')->get();
        $barangs = Barang::orderBy('id', 'DESC')->get();
        $b = Barang::orderBy('id', 'DESC')->get()->pluck('nama', 'id');
        $users = User::orderBy('id', 'DESC')->get();

        $total_pemasukan = 0;
        foreach ($transaksi as  $t) {
            $total_pemasukan += ($t->harga * $t->jmlmasuk);
        }

        // $total_pengeluaran = 0;
        // foreach ($barangs as  $barang) {
        //     $total_pengeluaran += ($barang->harga * $barang->jmlmasuk);
        // }

        // dd($barangs);
        return view(
            'transaksi.transaksi',
            compact(
                'transaksi',
                'barangs',
                'users',
                'total_pemasukan',
                // 'total_pengeluaran'
            )
        );
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_user' => 'required',
            'nama_barang' => 'required',
            'jmlmasuk' => 'required',
            'harga' => 'required',
            'waktu' => 'required',
            // 'total'=>'required',
        ]);

        // date_default_timezone_set('Asia/Jakarta');
        // $waktu = date("Y-m-d H:i:s");


        Cash::create([
            'nama_user' => $request->nama_user,
            'nama_barang' => $request->nama_barang,
            'jmlmasuk' => $request->jmlmasuk,
            'harga' => $request->harga,
            'waktu' => $request->waktu,
            // 'total'=>$request->total,
        ]);
        $barangs = Barang::find($request->barang_id);
        $barangs->jmlbarang + $request->jmlmasuk;
        $barangs->save;

        // return response()->json([
        //     'success'    => true,
        //     'message'    => 'Products In Created'
        // ]);


        return redirect()->route('transaksi');
    }

    public function ambilHarga(Request $request)
    {
        // Validasi request
        $request->validate([
            'nama_barang' => 'required|string', // Pastikan nama_barang ada dan bertipe string
        ]);

        // Ambil harga dari database berdasarkan nama_barang yang diterima
        $namaBarang = $request->input('nama_barang');
        $barang = Barang::where('nama', $namaBarang)->first();

        if ($barang) {
            // Jika barang ditemukan, kirimkan respons JSON dengan harga
            return response()->json(['harga' => $barang->harga]);
        } else {
            // Jika barang tidak ditemukan, kirimkan respons dengan status error
            return response()->json(['error' => 'Barang tidak ditemukan'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_user' => 'required',
            'nama_barang' => 'required',
            'jmlmasuk' => 'required',
            'harga' => 'required',
            // 'total'=>'required',
        ]);

        $cash = Cash::find($id);
        $cash->update([
            'nama_user' => $request->nama_user,
            'nama_barang' => $request->nama_barang,
            'jmlmasuk' => $request->jmlmasuk,
            'harga' => $request->harga,
            // 'total'=>$request->total,
        ]);

        return redirect()->route('transaksi');
    }

    public function destroy($id)
    {
        $cash = Cash::find($id);
        $cash->delete();
        return redirect()->route('transaksi');
    }
    // public function tax()
    // {
    //     $cash = Cash::all('user_id:id, name, barang_id:id,nama,jmlmasuk,harga');
    //     // $cash = User::all('id','name');
    //     // $cbar = Barang::all('id','nama','jmlmasuk','harga');

    //     // $transaksi =[
    //     //     'cash'=> $cash,
    //     //     'cbar'=>$cbar,
    //     // ];

    //     return view('cash.cash',compact('cash'));
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //        'barang_id' =>'required', 
    //        'total'=>'required'
    //     ]);

    //     Cash::create([
    //         'user_id'=> Auth::user()->id,
    //         'barang_id'=> $request->barang_id,
    //         'jmlmasuk'=>$request->jmlmasuk,
    //         'harga'=>$request->harga,
    //         'total'=> $request->total,
    //     ]);

    //     return redirect()->route('cash');
    // }

}
