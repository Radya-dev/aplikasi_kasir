<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    use HasFactory;

    protected $fillable =[
        'id_user',
        'id_pelanggan',
        'total',
        'tanggal',
        'status',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(pelanggan::class, 'id_pelanggan', 'id');
    }

    public function user()
    {
        return $this->belongsTo(user::class, 'id_user', 'id');
    }

}
