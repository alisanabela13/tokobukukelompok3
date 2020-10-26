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
            'judul' => 'required',
            'id_penulis' => 'required',
            'id_penerbit' => 'required', 
            'id_jenisbuku' => 'required',
            'id_suplier' => 'required',
            'tahun_terbit' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'lokasi' => 'required',
            'jumlah' => 'required'

        ]);
        
        $file = $request->file('file');
        $get_name = $file->getClientOriginalName();
        $file->move(public_path('buku/'), $get_name);

        $insert = Buku::insert([
            'file' => $get_name,
            'isbn' => $request->isbn,
            'judul' => $request->judul,
            'id_penulis' => $request->id_penulis,
            'id_penerbit' => $request->id_penerbit,
            'id_jenisbuku' => $request->id_jenisbuku,
            'id_suplier' => $request->id_suplier,
            'tahun_terbit' => $request->tahun_terbit,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'lokasi' => $request->lokasi,
            'jumlah' => $request->jumlah,


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
            'judul' => 'required',
            'id_penulis' => 'required',
            'id_penerbit' => 'required',
            'id_jenisbuku' => 'required',
            'id_suplier' => 'required',
            'tahun_terbit' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'lokasi' => 'required',
            'jumlah' => 'required',
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
            'judul' => $request->judul,
            'id_penulis' => $request->id_penulis,
            'id_penerbit' => $request->id_penerbit,
            'id_jenisbuku' => $request->id_jenisbuku,
            'id_suplier' => $request->id_suplier,
            'tahun_terbit' => $request->tahun_terbit,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'lokasi' => $request->lokasi,
            'jumlah' => $request->jumlah

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
