<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = User::orderBy('id', 'DESC')->get();

        return view('petugas.petugas', compact('petugas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'alamat' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('petugas');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            
        ]);

        $petugas = User::find($id);
        $petugas->update([
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('petugas');
    }

    public function destroy($id)
    {
        $petugas = User::find($id);
        $petugas->delete();
        return redirect()->route('petugas');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'DataUser.xlsx');
    }
}
