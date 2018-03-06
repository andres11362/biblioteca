<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Prestamo;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_libro');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->char('estado',1)->default(Prestamo::ESTADO_PRESTAMO);
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_libro')->references('id')->on('libros');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
}
