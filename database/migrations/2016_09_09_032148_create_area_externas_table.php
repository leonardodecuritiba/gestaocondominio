<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaExternasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_externas', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('idimovel');
            $table->unsignedInteger('idtipo_area_externa');

            $table->integer('quantidade');
            $table->decimal('area_construida',11,2);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area_externas');
    }
}
