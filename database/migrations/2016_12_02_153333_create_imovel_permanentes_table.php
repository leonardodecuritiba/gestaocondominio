<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImovelPermanentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imovel_permanente', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_pessoa');
            $table->unsignedInteger('id_imovel');
            $table->foreign('id_pessoa')->references('id')->on('associados')->onDelete('cascade');
            $table->foreign('id_imovel')->references('id')->on('imovels')->onDelete('cascade');
            $table->date('data_mudanca');

            $table->boolean('imovel_principal')->default(0);
            $table->boolean('tipo')->default(0);

            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('imovel_permanente');
    }
}
