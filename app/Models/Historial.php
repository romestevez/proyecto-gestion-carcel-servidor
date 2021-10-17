<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;

    protected $table = "historial";

    public function Reclusos(){
        return $this->hasMany(Recluso::class);
    }

    protected $fillable = [
        'id_recluso',
        'f_entrada',
        'f_salida',
        'antecedentes',
        'reincidente',

    ];
}
