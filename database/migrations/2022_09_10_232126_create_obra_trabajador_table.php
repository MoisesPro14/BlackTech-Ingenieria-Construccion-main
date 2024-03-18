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
        Schema::create('obra_trabajador', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('obra_id');
            $table->unsignedInteger('trabajador_id');
            $table->timestamps();

            $table->foreign('obra_id')->references('id')
                ->on('obras')->onDelete('cascade');

            $table->foreign('trabajador_id')->references('id')
                ->on('trabajadores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obra_trabajador');
    }
};
