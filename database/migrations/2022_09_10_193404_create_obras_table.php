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
        Schema::create('obras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100);
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->string('lugar', 100);
            $table->string('cliente', 100);
            $table->unsignedInteger('estado_id');
            $table->timestamps();

            $table->foreign('estado_id')->references('id')
                ->on('estados_obra');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obras');
    }
};
