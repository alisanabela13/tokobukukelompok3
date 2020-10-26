<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenisbuku extends Model
{
    protected $fillable = [
        'name'
    ];
    public function buku()
    {
        return $this->hasMany(Buku::class, 'name_id');
    }
}
