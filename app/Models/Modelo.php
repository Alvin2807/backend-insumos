<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;

    public $table = 'ins_modelos';
    protected $primarykey = 'id_modelo';
    protected $fillable = ['id_modelo','fk_marca','modelo','usuario_crea','fecha_crea','usuario_modifica',
    'fecha_modifica',];
    public $incrementing = true;
    public $timestamps = false;

    protected $casts = [
        'id_modelo' => 'integer',
        'fk_marca' => 'integer',
        'modelo' => 'string',
        'usuario_crea' => 'string',
    ];
}
