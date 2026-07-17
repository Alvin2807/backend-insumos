<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoImpresora extends Model
{
    use HasFactory;

    public    $table      = 'ins_tipo_impresoras';
    protected $primarykey = 'id_tipo_impresora';
    protected $fillable   = ['id_tipo_impresora','tipo_impresora'];

    protected $casts = [
        'id_tipo_impresora' =>'integer'
    ];
}
