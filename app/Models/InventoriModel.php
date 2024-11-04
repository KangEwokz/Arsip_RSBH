<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoriModel extends Model
{
    use HasFactory;

    
    protected $table = 'tbl_inventori';
    protected $primaryKey = 'id_inventori';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [

        'id_inventori',
        'nm_barang', 
        'isi', 
        'id_jenis', 
        'id_klasifikasi', 
        'spesifikasi', 
        'jumlah', 
        'harga', 
        'status'
    ];

}
