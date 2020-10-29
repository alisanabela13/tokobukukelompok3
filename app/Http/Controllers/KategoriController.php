<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{
    public function __construct(Kategori $kategori)
    {
        $this->Kategori = $kategori;
    }

    public function index()
    {
        $kategori = $this->Kategori->get();
        return view('kategori_admin.index', compact('kategori'));
    }
    
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required'
        ]);

       
        $insert = Kategori::insert([
            'nama' => $request->nama
        ]);

        if($insert == true ){
            return redirect()->route('kategori')->with(['message' => 'Berhasil Menambah Kategori', 'type' => 'success']);
        } else {

            return redirect()->route('kategori')->with(['message' => 'Gagal Menambah Kategori', 'type' => 'error']);
        }
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required'
        ]);

        $update = Kategori::where('id', $id)->update([
            'nama' => $request->nama
        ]);

        if($update == true) {
            return redirect()->route('kategori')->with(['message' => 'Berhasil Mengubah Kategori', 'type' => 'success']);
        } else {
            return redirect()->route('kategori')->with(['message' => 'Gagal Mengubah Kategori', 'type' => 'error']);
        }
    }

    public function destroy($id)
    {
        Kategori::destroy($id);
        return redirect()->route('kategori', ['id' => $id]);
    }

}
