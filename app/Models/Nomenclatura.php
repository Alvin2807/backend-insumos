<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomenclatura extends Model
{
    use HasFactory;

    public    $table = "ins_nomenclaturas";
    protected $primarykey = "id_nomenclatura";
    protected $fillable = ['id_nomenclatura','fk_despacho','fk_tipo_impresora','direccion_ip','nomenclatura',
    'fk_modelo','usuario_crea','fecha_crea','usuario_modifica','fecha_modifica'];
    public $incrementing = true;
    public $timestamps   = false;

    protected $casts = 
    [
        'id_nomenclatura'   =>'integer',
        'fk_despacho'       =>'integer',
        'fk_tipo_impresora' =>'integer',
        'fk_modelo'         =>'integer'
    ];

}
