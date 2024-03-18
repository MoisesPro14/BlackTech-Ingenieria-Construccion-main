<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajadores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres', 50);
            $table->string('apellidos', 50);
            $table->string('documento', 12);
            $table->boolean('estado')->default(true);
            $table->unsignedInteger('categoria_id');
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')
                ->on('categorias_trabajador');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajadores');
    }
};
