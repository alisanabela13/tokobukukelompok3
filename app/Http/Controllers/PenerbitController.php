<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penerbit;

class PenerbitController extends Controller
{
    public function __construct(Penerbit $penerbit)
    {
        $this->penerbit = $penerbit;
    }
    public function index()
    {
        $penerbit = $this->penerbit->get();
        return view('penerbit_admin.index', compact('penerbit'));
    }

    public function create()
    {
        return view('penerbit_admin.create');
    }
    
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required'
        ]);

       
        $insert = Penerbit::insert([
            'nama' => $request->nama
        ]);

        if($insert == true ){
            return redirect()->route('penerbit')->with(['message' => 'Berhasil Menambah Penerbit', 'type' => 'success']);
        } else {

            return redirect()->route('penerbit')->with(['message' => 'Gagal Menambah Penerbit', 'type' => 'error']);
        }
    }

    public function edit($id)
    {
        $penerbit = Penerbit::where('id', $id)->first();
        return view('penerbit_admin.edit', compact('penerbit'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required'
        ]);

        $update = Penerbit::where('id', $id)->update([
            'nama' => $request->nama
        ]);

        if($update == true) {
            return redirect()->route('penerbit')->with(['message' => 'Berhasil Mengubah Nama Penerbit', 'type' => 'success']);
        } else {
            return redirect()->route('penerbit')->with(['message' => 'Gagal Mengubah Nama Penerbit', 'type' => 'error']);
        }
    }

    public function destroy($id)
    {
        Penerbit::destroy($id);
        return redirect()->route('penerbit', ['id' => $id]);
    }
}
