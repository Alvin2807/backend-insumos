<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VistaModelos extends Model
{
    use HasFactory;

    public $table = 'vista_modelos_impresoras';
    protected $fillable = ['id_modelo','fk_marca','modelo','marca',
    'fecha_modifica',];
    public $incrementing = true;
    public $timestamps = false;

    protected $casts = [
        'id_modelo' => 'integer',
        'fk_marca' => 'integer',
    ];
}
