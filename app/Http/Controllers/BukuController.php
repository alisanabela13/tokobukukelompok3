<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\Penulis;
use App\Penerbit;
use App\Jenisbuku;
use App\Suplier;

class BukuController extends Controller
{
    public function __construct(Buku $buku, Penulis $penulis, Penerbit $penerbit, Jenisbuku $jenisbuku, Suplier $suplier)
    {
        $this->buku = $buku;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->jenisbuku = $jenisbuku;
    }
    public function index()
    {
        $buku = $this->buku->get();
        $penulis = $this->buku->get();
        return view('buku_admin.index', compact('buku', 'penulis'));
    }
    
    public function create()
    {
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $jenisbuku = Jenisbuku::all();
        $suplier = Suplier::all();
        return view('buku_admin.create', compact('penulis', 'penerbit', 'jenisbuku', 'suplier'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'file' => 'required|mimes:png,jpg,jpeg|max:2048',
            'isbn' => 'required',
            'judul_buku' => 'required',
            'penulis_id' => 'required',
            'penerbit_id' => 'required', 
            'jenisbuku_id' => 'required',
            'suplier_id' => 'required',
            'tahun_terbit' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'rak_buku' => 'required',
            'jumlah_stok' => 'required'

        ]);
        
        $file = $request->file('file');
        $get_name = $file->getClientOriginalName();
        $file->move(public_path('buku/'), $get_name);

        $insert = Buku::insert([
            'file' => $get_name,
            'isbn' => $request->isbn,
            'judul_buku' => $request->judul_buku,
            'penulis_id' => $request->penulis_id,
            'penerbit_id' => $request->penerbit_id,
            'jenisbuku_id' => $request->jenisbuku_id,
            'suplier_id' => $request->suplier_id,
            'tahun_terbit' => $request->tahun_terbit,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'rak_buku' => $request->rak_buku,
            'jumlah_stok' => $request->jumlah_stok,


        ]);

        if($insert == true ){
            return redirect()->route('buku')->with(['message' => 'Berhasil Menambah Buku', 'type' => 'success']);
        } else {
            return redirect()->route('buku')->with(['message' => 'Gagal Menambah Buku', 'type' => 'error']);
        }
    }

    public function edit($id)
    {
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $jenisbuku = Jenisbuku::all();
        $suplier = Suplier::all();
        $buku = Buku::where('id', $id)->first();

        return view('buku_admin.edit', compact('penulis', 'penerbit', 'jenisbuku', 'suplier', 'buku'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'file' => 'max:2048',
            'isbn' => 'required',
            'judul_buku' => 'required',
            'penulis_id' => 'required',
            'penerbit_id' => 'required',
            'jenisbuku_id' => 'required',
            'suplier_id' => 'required',
            'tahun_terbit' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'rak_buku' => 'required',
            'jumlah_stok' => 'required',
        ]);

        if ( $request->file ) {
            $file = $request->file('file');
            $get_name = $file->getClientOriginalName();
            $file->move(public_path('buku/'), $get_name);
          }

          $buku = Buku::where('id', $id);

          $update = $buku->update([
            'file' => $request->file ? $get_name : $buku->first()->file,
            'isbn' => $request->isbn,
            'judul_buku' => $request->judul_buku,
            'penulis_id' => $request->penulis_id,
            'penerbit_id' => $request->penerbit_id,
            'jenisbuku_id' => $request->jenisbuku_id,
            'suplier_id' => $request->suplier_id,
            'tahun_terbit' => $request->tahun_terbit,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'rak_buku' => $request->rak_buku,
            'jumlah_stok' => $request->jumlah_stok

        ]);

        if($update == true) {
            return redirect()->route('buku')->with(['message' => 'Berhasil Mengubah Data Buku', 'type' => 'success']);
        } else {
            return redirect()->route('buku')->with(['message' => 'Gagal Mengubah Data Buku', 'type' => 'error']);
        }
    }

    public function detail($id)
    {
        $buku = Buku::where('id', $id)->first();
        $penulis = Penulis::where('id', $id)->first();
        $penerbit = Penerbit::where('id', $id)->first();
        $jenisbuku = Jenisbuku::where('id', $id)->first();
        $suplier = Suplier::where('id', $id)->first();
        return view('buku_admin.detail', compact('buku', 'penulis', 'penerbit', 'jenisbuku', 'suplier'));
    }

    public function destroy($id)
    {
        Buku::destroy($id);
        return redirect()->route('buku', ['id' => $id]);
    }
}
