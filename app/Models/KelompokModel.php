<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_kelompok';
    protected $primaryKey = 'id_kelompok';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
    protected $fillable = [

        'nm_kelompok', 
        'id_kelompok',
    ];
}
