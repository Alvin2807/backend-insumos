<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    public    $table = "ins_articulos";
    protected $primarykey = "id_articulo";
    protected $fillable = ['id_articulo','codigo','modelo_tinta','fk_categoria','fk_marca','fk_modelo','fk_color','stock',
    'cantidad_solicitada','cantidad_confirmada','usuario_crea','fecha_crea','usuario_modifica','fecha_modifica','detalle_insumo'];
    public $incrementing = true;
    public $timestamps = false;

    protected $casts = 
    [
        'id_articulo' =>'integer',
        'fk_marca' =>'integer',
        'fk_categoria' =>'integer',
        'fk_marca' =>'integer',
        'fk_modelo' =>'integer',
        'fk_color' =>'integer',
        'stock' =>'integer',
        'cantidad_solicitada'=>'integer',
        'cantidad_confirmada'=>'integer'
    ];
}
