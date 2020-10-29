<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemasok;

class PemasokController extends Controller
{
    public function __construct(Pemasok $Pemasok)
    {
        $this->Pemasok = $Pemasok;
    }

    public function index()
    {
        $Pemasok = $this->Pemasok->get();
        return view('Pemasok_admin.index', compact('Pemasok'));
    }

    public function create()
    {
        return view('Pemasok_admin.create');
    }
    
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'no_hp' => 'required'
        ]);

       
        $insert = Pemasok::insert([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_hp' => $request->no_hp
        ]);

        if($insert == true ){
            return redirect()->route('Pemasok')->with(['message' => 'Berhasil Menambah Pemasok', 'type' => 'success']);
        } else {

            return redirect()->route('Pemasok')->with(['message' => 'Gagal Menambah Pemasok', 'type' => 'error']);
        }
    }

    public function edit($id)
    {
        $Pemasok = Pemasok::where('id', $id)->first();
        return view('Pemasok_admin.edit', compact('Pemasok'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'no_hp' => 'required'
        ]);

        $update = Pemasok::where('id', $id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_hp' => $request->no_hp
        ]);

        if($update == true) {
            return redirect()->route('Pemasok')->with(['message' => 'Berhasil Mengubah Pemasok', 'type' => 'success']);
        } else {
            return redirect()->route('Pemasok')->with(['message' => 'Gagal Mengubah Pemasok', 'type' => 'error']);
        }
    }

    public function destroy($id)
    {
        Pemasok::destroy($id);
        return redirect()->route('Pemasok', ['id' => $id]);
    }
}
