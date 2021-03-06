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

            $table->unsignedInteger('idtipo_area_externa');
            $table->unsignedInteger('idimovel');

            $table->foreign('idimovel')->references('id')->on('imovels')->onDelete('cascade');
            $table->foreign('idtipo_area_externa')->references('id')->on('tipo_area_externas');

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
