<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suplier;

class SuplierController extends Controller
{
    public function __construct(Suplier $suplier)
    {
        $this->suplier = $suplier;
    }

    public function index()
    {
        $suplier = $this->suplier->get();
        return view('suplier_admin.index', compact('suplier'));
    }

    public function create()
    {
        return view('suplier_admin.create');
    }
    
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'no_hp' => 'required'
        ]);

       
        $insert = Suplier::insert([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_hp' => $request->no_hp
        ]);

        if($insert == true ){
            return redirect()->route('suplier')->with(['message' => 'Berhasil Menambah Suplier', 'type' => 'success']);
        } else {

            return redirect()->route('suplier')->with(['message' => 'Gagal Menambah Suplier', 'type' => 'error']);
        }
    }

    public function edit($id)
    {
        $suplier = Suplier::where('id', $id)->first();
        return view('suplier_admin.edit', compact('suplier'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'no_hp' => 'required'
        ]);

        $update = Suplier::where('id', $id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_hp' => $request->no_hp
        ]);

        if($update == true) {
            return redirect()->route('suplier')->with(['message' => 'Berhasil Mengubah Suplier', 'type' => 'success']);
        } else {
            return redirect()->route('suplier')->with(['message' => 'Gagal Mengubah Suplier', 'type' => 'error']);
        }
    }

    public function destroy($id)
    {
        Suplier::destroy($id);
        return redirect()->route('suplier', ['id' => $id]);
    }
}
