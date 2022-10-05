<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table ='produk';
    protected $primarykey ='id';
    protected $fillable = [
        'nama','stok','harga', 
    ];

    public function order ()
    {
        return $this->belongsTo('App\Order', 'id');
    }
}
