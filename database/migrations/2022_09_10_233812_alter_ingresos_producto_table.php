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
        Schema::table('ingresos_producto', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->default(1)->after('marca_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ingresos_producto', function (Blueprint $table) {
            $table->dropForeign('ingresos_producto_user_id_foreign');
        });
    }
};
