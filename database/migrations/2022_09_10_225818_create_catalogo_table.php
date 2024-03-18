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
        Schema::create('catalogo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100);
            $table->boolean('estado')->default(true);
            $table->string('unidad', 10);
            $table->unsignedInteger('tipo_id');
            $table->timestamps();

            $table->foreign('tipo_id')->references('id')
                ->on('tipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalogo');
    }
};
