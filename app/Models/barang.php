<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barangs';

    protected $fillable = [
        'nama_barang',
        'stok',
        'kategori_id',
    ];

    public function kategori()
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }
}
