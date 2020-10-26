<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    protected $fillable = [
        'nama',
        'alamat',
        'email',
        'no_hp'
    ];
    public function buku()
    {
        return $this->hasMany(Buku::class, 'id_suplier');
    }
}
