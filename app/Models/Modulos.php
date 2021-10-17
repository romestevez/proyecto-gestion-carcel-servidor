<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulos extends Model
{
    use HasFactory;
    protected $table = "modulos";

    public function celdas(){
        return $this->hasMany(Celdas::class);
    }

    protected $fillable = [
        'nombre',
        'nivel_peligrosidad',
    ];
}
