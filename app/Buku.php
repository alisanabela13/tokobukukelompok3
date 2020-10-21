<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $fillable = [
        'file',
        'isbn',
        'judul_buku',
        'penulis_id',
        'penerbit_id',
        'jenis_buku_id',
        'suplier_id',
        'tahun_terbit',
        'harga_beli',
        'harga_jual',
        'jumlah_stok'
    ];
    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'penulis_id');
    }

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'penerbit_id');
    }

    public function jenisbuku()
    {
        return $this->belongsTo(Jenisbuku::class, 'jenisbuku_id');
    }

    public function suplier()
    {
        return $this->belongsTo(Suplier::class, 'suplier_id');
    }

}
