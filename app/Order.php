<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ='order';
    protected $primarykey ='id_order';
    protected $fillable = [
        'id','qty', 'harga', 
    ];

    public function produk ()
    {
        return $this->belongsTo('App\Produk', 'id');
    }
}
