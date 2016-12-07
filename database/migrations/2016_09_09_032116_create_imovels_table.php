<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImovelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imovels', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('idlocalidade');
            $table->unsignedInteger('idsituacao_imovel');

            $table->foreign('idlocalidade')->references('id')->on('localidades')->onDelete('cascade');
            $table->foreign('idsituacao_imovel')->references('id')->on('situacao_imovels')->onDelete('cascade');

            $table->string('cep',16);
            $table->string('quadra',8);
            $table->string('lote',8);
            $table->string('logradouro',50);
            $table->string('obs',256);
            $table->boolean('status')->default(1);

            $table->decimal('area_imovel',11,2);
            $table->decimal('area_construida',11,2);
            $table->decimal('area_ajardinada',11,2);

            $table->softDeletes();
            $table->timestamps();
            $table->boolean('softdeleted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imovels');
    }
}
