<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImovelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imovel', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('idproprietario');
            $table->unsignedInteger('idinquilino');
            $table->unsignedInteger('idlocalidade');
            $table->unsignedInteger('idsituacao_imovel');

            $table->string('cep',16);
            $table->string('quadra',8);
            $table->string('lote',8);
            $table->string('logradouro',50);
            $table->string('obs',256);
            $table->boolean('status')->default(1);

            $table->decimal('area_imovel',11,2);
            $table->decimal('area_construida',11,2);
            $table->decimal('area_ajardinada',11,2);
            $table->date('data_mudanca');

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
        Schema::dropIfExists('imovel');
    }
}
