<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penulis;

class PenulisController extends Controller
{
    public function __construct(Penulis $penulis)
    {
        $this->penulis = $penulis;
    }
    public function index()
    {
        $penulis = $this->penulis->get();
        return view('penulis_admin.index', compact('penulis'));
    }
    public function create()
    {
        return view('penulis_admin.create');
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required'
        ]);

       
        $insert = Penulis::insert([
            'nama' => $request->nama
        ]);

        if($insert == true ){
            return redirect()->route('penulis')->with(['message' => 'Berhasil Menambah Penulis', 'type' => 'success']);
        } else {

            return redirect()->route('penulis')->with(['message' => 'Gagal Menambah Penulis', 'type' => 'error']);
        }
    }

    public function edit($id)
    {
        $penulis = Penulis::where('id', $id)->first();
        return view('penulis_admin.edit', compact('penulis'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required'
        ]);

        $update = Penulis::where('id', $id)->update([
            'nama' => $request->nama
        ]);

        if($update == true) {
            return redirect()->route('penulis')->with(['message' => 'Berhasil Mengubah Nama Penulis', 'type' => 'success']);
        } else {
            return redirect()->route('penulis')->with(['message' => 'Gagal Mengubah Nama Penulis', 'type' => 'error']);
        }
    }
    
    public function destroy($id)
    {
        Penulis::destroy($id);
        return redirect()->route('penulis', ['id' => $id]);
    }
}
