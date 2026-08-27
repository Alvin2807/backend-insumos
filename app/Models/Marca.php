<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    public    $table = 'ins_marcas';
    protected $primaryKey = 'id_marca';
    protected $fillable = ['id_marca','marca','usuario_crea','fecha_crea','usuario_modifica','fecha_modifica','cant_mov'];
    public    $timestamps = false;
    public    $incrementing = true;

    protected $casts =
    [
        'cant_mov'=> 'integer',
        'id_marca'=>'integer'
    ];
}
