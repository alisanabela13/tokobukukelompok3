<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemasok;

class PemasokController extends Controller
{
    public function __construct(Pemasok $pemasok)
    {
        $this->Pemasok = $pemasok;
    }

    public function index()
    {
        $pemasok = $this->Pemasok->get();
        return view('pemasok_admin.index', compact('pemasok'));
    }

    public function create()
    {
        return view('pemasok_admin.create');
    }
    
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'telepon' => 'required'
        ]);

       
        $insert = Pemasok::insert([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'telepon' => $request->telepon
        ]);

        if($insert == true ){
            return redirect()->route('pemasok')->with(['message' => 'Berhasil Menambah Pemasok', 'type' => 'success']);
        } else {

            return redirect()->route('pemasok')->with(['message' => 'Gagal Menambah Pemasok', 'type' => 'error']);
        }
    }

    public function edit($id)
    {
        $pemasok = Pemasok::where('id', $id)->first();
        return view('pemasok_admin.edit', compact('pemasok'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'telepon' => 'required'
        ]);

        $update = Pemasok::where('id', $id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'telepon' => $request->telepon
        ]);

        if($update == true) {
            return redirect()->route('pemasok')->with(['message' => 'Berhasil Mengubah Pemasok', 'type' => 'success']);
        } else {
            return redirect()->route('pemasok')->with(['message' => 'Gagal Mengubah Pemasok', 'type' => 'error']);
        }
    }

    public function destroy($id)
    {
        Pemasok::destroy($id);
        return redirect()->route('pemasok', ['id' => $id]);
    }
}
