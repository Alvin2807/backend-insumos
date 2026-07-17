<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    public    $table = 'ins_marcas';
    protected $primaryKey = 'id_marca';
    protected $fillable = ['id_marca','marca'];
    public    $timestamps = false;
    public  $incrementing = true;
}
