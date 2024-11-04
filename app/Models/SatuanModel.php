<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuanModel extends Model
{
    use HasFactory;


    protected $table = 'tbl_satuan';
    protected $primaryKey = 'id_satuan';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
    protected $fillable = [

        'id_satuan',
        'nm_satuan',
    ];

}
