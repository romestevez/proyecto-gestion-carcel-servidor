<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->datetime('f_entrada');
            $table->datetime('f_salida');
            $table->foreignId('id_recluso')->constrained('reclusos');
            $table->text('antecedentes');
            $table->enum('reincidente', ['si', 'no']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial');
    }
}
