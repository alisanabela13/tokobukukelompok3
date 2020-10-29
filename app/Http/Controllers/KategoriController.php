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

    public function create()
    {
        return view('Kategori_admin.create');
    }
    
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

       
        $insert = Kategori::insert([
            'name' => $request->name
        ]);

        if($insert == true ){
            return redirect()->route('Kategori')->with(['message' => 'Berhasil Menambah Kategori', 'type' => 'success']);
        } else {

            return redirect()->route('Kategori')->with(['message' => 'Gagal Menambah Kategori', 'type' => 'error']);
        }
    }

    public function edit($id)
    {
        $kategori = Kategori::where('id', $id)->first();
        return view('Kategori_admin.edit', compact('Kategori'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $update = Kategori::where('id', $id)->update([
            'name' => $request->name
        ]);

        if($update == true) {
            return redirect()->route('Kategori')->with(['message' => 'Berhasil Mengubah Kategori', 'type' => 'success']);
        } else {
            return redirect()->route('Kategori')->with(['message' => 'Gagal Mengubah Kategori', 'type' => 'error']);
        }
    }

    public function destroy($id)
    {
        Kategori::destroy($id);
        return redirect()->route('Kategori', ['id' => $id]);
    }

}
