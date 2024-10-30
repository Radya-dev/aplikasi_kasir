<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_penjualan extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function penjualan()
    {
        return $this->belongsTo(penjualan::class,'nobon' ,'id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class,'id_produk','id');
    }
}
