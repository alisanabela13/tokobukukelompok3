<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\Penulis;
use App\Penerbit;
use App\Kategori;
use App\Pemasok;
use App\Lokasi;
use App\LogBuku;

class BukuController extends Controller
{
    public function __construct(Buku $buku, Penulis $penulis, Penerbit $penerbit, Kategori $kategori, Pemasok $Pemasok, Lokasi $lokasi, LogBuku $logbuku)
    {
        $this->buku = $buku;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->kategori = $kategori;
        $this->lokasi = $lokasi;
        $this->logbuku = $logbuku;
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
        $lokasi = Lokasi::all();
        return view('buku_admin.create', compact('penulis', 'penerbit', 'kategori', 'Pemasok', 'lokasi'));
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
            'harga_jual' => 'required',
            'jumlah' => 'required'

        ]);
        
        $sampul = $request->file('sampul');
        $get_name = $sampul->getClientOriginalName();
        $sampul->move(public_path('images/buku/'), $get_name);

        $buku = Buku::create([
            'sampul' => $get_name,
            'isbn' => $request->isbn,
            'judul' => $request->judul,
            'tahun_terbit' => $request->tahun_terbit,
            'id_penulis' => $request->id_penulis,
            'id_penerbit' => $request->id_penerbit,
            'id_kategori' => $request->id_kategori,
            'id_pemasok' => $request->id_pemasok,
            'id_lokasi' => $request->id_lokasi,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,

            
        ]);
        $logbuku = LogBuku::create([
            'id_buku' => $buku->id,
            'id_user' => auth()->user()->id,
            'harga_jual' => $request->harga_jual,
            'harga_beli' => $request->harga_beli,
            'jumlah' => $request->jumlah,
            'status' => 'Baru'
        ]);

       

        if($buku == true ){
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
            'sampul' => 'max:2048',
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

        if ( $request->sampul ) {
            $sampul = $request->file('sampul');
            $get_name = $sampul->getClientOriginalName();
            $sampul->move(public_path('images/buku/'), $get_name);
          }

          $buku = Buku::where('id', $id);

          $update = $buku->update([
            'sampul' => $request->sampul ? $get_name : $buku->first()->sampul,
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
        $lokasi = Lokasi::where('id', $id)->first();
        return view('buku_admin.detail', compact('buku', 'penulis', 'penerbit', 'kategori', 'Pemasok', 'lokasi'));
    }

    public function destroy($id)
    {
        Buku::destroy($id);
        return redirect()->route('buku', ['id' => $id]);
    }
}
