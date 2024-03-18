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
        Schema::table('entrega_productos', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->default(1)->after('producto_id');
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
        Schema::table('entrega_productos', function (Blueprint $table) {
            $table->dropForeign('entrega_productos_user_id_foreign');
        });
    }
};
