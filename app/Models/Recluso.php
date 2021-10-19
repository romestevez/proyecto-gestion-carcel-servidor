<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recluso extends Model
{
    use HasFactory;

    protected $table = "reclusos";

    public function celdas() {
        return $this -> belongsTo(Celdas::class);
    }

    public function historial() {
        return $this -> belongsTo(Historial::class);
    }


    protected $fillable = [
        'nombre',
        'foto',
        'apellido',
        'edad',
        'dni',
        'descripcion',
        'foto',
        'id_celda',
    ];

}
