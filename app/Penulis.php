<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    protected $fillable = [
        'nama_penulis'
    ];
    public function buku()
    {
        return $this->hasMany(Buku::class, 'penulis_id');
    }
}
