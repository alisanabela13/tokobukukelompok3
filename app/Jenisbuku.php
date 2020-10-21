<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenisbuku extends Model
{
    protected $fillable = [
        'jenis_buku'
    ];
    public function buku()
    {
        return $this->hasMany(Buku::class, 'jenis_buku_id');
    }
}
