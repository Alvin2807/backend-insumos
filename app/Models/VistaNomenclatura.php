<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VistaNomenclatura extends Model
{
    use HasFactory;

    public    $table    = 'vista_nomenclaturas';
    protected $fillable = ['id_nomenclatura','fk_despacho','fk_modelo','modelo','marca','tipo_impresora','direccion_ip','nomenclatura'];

    protected $casts    = 
    [
        'id_nomenclatura' =>'integer',
        'fk_despacho'     =>'integer',
        'fk_modelo'       =>'integer'  
    ];
}
