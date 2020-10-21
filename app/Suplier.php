<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    protected $fillable = [
        'nama_suplier',
        'alamat_suplier',
        'email',
        'no_hp'
    ];
    public function buku()
    {
        return $this->hasMany(Buku::class, 'suplier_id');
    }
}
