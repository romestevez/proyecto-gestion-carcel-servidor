<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\integer;
use Illuminate\Support\Enum;
use App\Models\Modulos;
use App\Models\Celdas;
use App\Models\Recluso;
use App\Models\Historial;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->limpiarBasededatos();

        $moduloAlfa = Modulos::create([
            'nombre' => 'Alfa',
            'nivel_peligrosidad' => 'grave',
        ]);
        
        $moduloBeta = Modulos::create([
            'nombre' => 'Beta',
            'nivel_peligrosidad' => 'grave',
        ]);

        $celda1 = Celdas::create([
            'nombre' => 'Celda 1',
            'n_reclusos' => '1',
            'capacidad' => '2',
            'id_modulo' => $moduloAlfa->id,
        ]);
        $celda2 = Celdas::create([
            'nombre' => 'Celda 2',
            'n_reclusos' => '1',
            'capacidad' => '2',
            'id_modulo' => $moduloAlfa->id,
        ]);
        $celda3 = Celdas::create([
            'nombre' => 'Celda 1',
            'n_reclusos' => '1',
            'capacidad' => '2',
            'id_modulo' => $moduloAlfa->id,
        ]);

        $recluso1 = Recluso::create([
            'nombre' => 'Alberto',
            'apellido' => 'Pérez',
            'edad' => 18,
            'dni' => '29873902S',
            'id_celda' => $celda2->id,
            'descripcion' => 'Ladrón'
        ]);

        $recluso2 = Recluso::create([
            'nombre' => 'Juan',
            'apellido' => 'Estévez',
            'edad' => 43,
            'dni' => '29874902Z',
            'id_celda' => $celda3->id,
            'descripcion' => 'Sicario'
        ]);

        $recluso3 = Recluso::create([
            'nombre' => 'Pepe',
            'apellido' => 'Romero',
            'edad' => 33,
            'dni' => '29833102M',
            'id_celda' => $celda1->id,
            'descripcion' => 'Traficante'
        ]);

        $recluso4 = Recluso::create([
            'nombre' => 'David',
            'apellido' => 'Romero',
            'edad' => 31,
            'dni' => '29223102B',
            'id_celda' => $celda1->id,
            'descripcion' => 'Matón'
        ]);

        $recluso5 = Recluso::create([
            'nombre' => 'Raul',
            'apellido' => 'Machis',
            'edad' => 33,
            'dni' => '29441102Z',
            'id_celda' => $celda3->id,
            'descripcion' => 'Evasión de impuestos'
        ]);

        $recluso6 = Recluso::create([
            'nombre' => 'Enrique',
            'apellido' => 'Gómez',
            'edad' => 66,
            'dni' => '29176102R',
            'id_celda' => $celda2->id,
            'descripcion' => 'Traficante'
        ]);

        $historial1 = Historial::create([
            'antecedentes' => 'Crimen organizado',
            'id_recluso' => 1,
            'f_entrada' => "2021/12/03",
            'f_salida' => '2031/12/03',
            'reincidente'=> 'no',
        ]);
    }

    public function limpiarBasededatos()
    {
        Historial::query()->delete();
        Recluso::query()->delete();
        Celdas::query()->delete();
        Modulos::query()->delete();
    }
}
