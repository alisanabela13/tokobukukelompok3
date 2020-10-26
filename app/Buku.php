<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $fillable = [
        'file',
        'isbn',
        'judul',
        'id_penulis',
        'id_penerbit',
        'name_id',
        'id_suplier',
        'tahun_terbit',
        'harga_beli',
        'harga_jual',
        'jumlah'
    ];
    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'id_penulis');
    }

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'id_penerbit');
    }

    public function jenisbuku()
    {
        return $this->belongsTo(Jenisbuku::class, 'id_jenisbuku');
    }

    public function suplier()
    {
        return $this->belongsTo(Suplier::class, 'id_suplier');
    }

}
