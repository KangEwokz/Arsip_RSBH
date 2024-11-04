<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlasifikasiModel extends Model
{
    use HasFactory;


    protected $table = 'tbl_klasifikasi';
    protected $primaryKey = 'id_klasifikasi';
    public $incrementing = true;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [

        'id_klasifikasi',
        'nm_klasifikasi', 
        
    ];


    
}