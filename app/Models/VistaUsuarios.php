<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VistaUsuarios extends Model
{
    use HasFactory;

    public     $table = 'vista_usuarios';
    protected  $fillable = ['id','name','apellido','usuario','fk_rol','email','password','despacho','rol','provincia','fk_despacho'];

    protected  $casts =
    [
        'fk_despacho' => 'integer',
        'fk_rol'=>'integer'
    ];
}
