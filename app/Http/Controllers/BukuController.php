<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\Penulis;
use App\Penerbit;
use App\Kategori;
use App\Pemasok;

class BukuController extends Controller
{
    public function __construct(Buku $buku, Penulis $penulis, Penerbit $penerbit, Kategori $kategori, Pemasok $Pemasok)
    {
        $this->buku = $buku;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->Kategori = $kategori;
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
        $kategori = Kategori::all();
        $Pemasok = Pemasok::all();
        return view('buku_admin.create', compact('penulis', 'penerbit', 'kategori', 'Pemasok'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'sampul' => 'required|mimes:png,jpg,jpeg|max:2048',
            'isbn' => 'required',
            'judul' => 'required',
            'tahun_terbit' => 'required',
            'id_penulis' => 'required',
            'id_penerbit' => 'required', 
            'id_kategori' => 'required',
            'id_pemasok' => 'required',
            'id_lokasi' => 'required',
            'harga' => 'required',
            'jumlah' => 'required'

        ]);
        
        $file = $request->file('file');
        $get_name = $file->getClientOriginalName();
        $file->move(public_path('buku/'), $get_name);

        $insert = Buku::insert([
            'sampul' => $get_name,
            'isbn' => $request->isbn,
            'judul' => $request->judul,
            'tahun_terbit' => $request->tahun_terbit,
            'id_penulis' => $request->id_penulis,
            'id_penerbit' => $request->id_penerbit,
            'id_kategori' => $request->id_kategori,
            'id_pemasok' => $request->id_pemasok,
            'id_lokasi' => $request->lokasi,
            'harga' => $request->harga,
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
        $kategori = Kategori::all();
        $Pemasok = Pemasok::all();
        $buku = Buku::where('id', $id)->first();

        return view('buku_admin.edit', compact('penulis', 'penerbit', 'kategori', 'Pemasok', 'buku'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'file' => 'max:2048',
            'isbn' => 'required',
            'judul' => 'required',
            'id_penulis' => 'required',
            'id_penerbit' => 'required',
            'id_kategori' => 'required',
            'id_pemasok' => 'required',
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
            'id_kategori' => $request->id_kategori,
            'id_pemasok' => $request->id_pemasok,
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
        $kategori = Kategori::where('id', $id)->first();
        $Pemasok = Pemasok::where('id', $id)->first();
        return view('buku_admin.detail', compact('buku', 'penulis', 'penerbit', 'Kategori', 'Pemasok'));
    }

    public function destroy($id)
    {
        Buku::destroy($id);
        return redirect()->route('buku', ['id' => $id]);
    }
}
