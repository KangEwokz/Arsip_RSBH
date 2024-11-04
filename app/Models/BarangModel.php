<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_barang';
    protected $primaryKey = 'id_barang';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [

        'id_barang',
        'id_satuan', 
        'id_kelompok',
        'id_klasifikasi', 
        'nm_barang',
        'jumlah', 
        'harga', 
        'tanggal_pembelian'

    ];
        
}
