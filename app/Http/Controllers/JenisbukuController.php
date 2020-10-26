<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenisbuku;

class JenisbukuController extends Controller
{
    public function __construct(Jenisbuku $jenisbuku)
    {
        $this->jenisbuku = $jenisbuku;
    }

    public function index()
    {
        $jenisbuku = $this->jenisbuku->get();
        return view('jenisbuku_admin.index', compact('jenisbuku'));
    }

    public function create()
    {
        return view('jenisbuku_admin.create');
    }
    
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

       
        $insert = Jenisbuku::insert([
            'name' => $request->name
        ]);

        if($insert == true ){
            return redirect()->route('jenisbuku')->with(['message' => 'Berhasil Menambah Jenis Buku', 'type' => 'success']);
        } else {

            return redirect()->route('jenisbuku')->with(['message' => 'Gagal Menambah Jenis Buku', 'type' => 'error']);
        }
    }

    public function edit($id)
    {
        $jenisbuku = Jenisbuku::where('id', $id)->first();
        return view('jenisbuku_admin.edit', compact('jenisbuku'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $update = Jenisbuku::where('id', $id)->update([
            'name' => $request->name
        ]);

        if($update == true) {
            return redirect()->route('jenisbuku')->with(['message' => 'Berhasil Mengubah Jenis Buku', 'type' => 'success']);
        } else {
            return redirect()->route('jenisbuku')->with(['message' => 'Gagal Mengubah Jenis Buku', 'type' => 'error']);
        }
    }

    public function destroy($id)
    {
        Jenisbuku::destroy($id);
        return redirect()->route('jenisbuku', ['id' => $id]);
    }

}
