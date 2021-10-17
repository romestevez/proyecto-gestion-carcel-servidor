<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Celdas extends Model
{
    use HasFactory;

    protected $table = "celdas";

    public function modulos() {
        return $this -> belongsTo(Modulos::class);
    }

    public function Reclusos(){
        return $this->hasMany(Reclusos::class);
    }

    protected $fillable = [
        'nombre',
        'capacidad',
        'n_reclusos',
        'id_modulo',
    ];
}
