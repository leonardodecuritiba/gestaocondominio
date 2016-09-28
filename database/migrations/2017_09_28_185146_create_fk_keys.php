<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFkKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imovel', function (Blueprint $table) {
//            $table->foreign('idinquilino')->references('id')->on('localidade')->onDelete('cascade');
//            $table->foreign('idlocalidade')->references('id')->on('localidade')->onDelete('cascade');
            $table->foreign('idsituacao_imovel')->references('id')->on('situacao_imovels')->onDelete('cascade');
        });
        Schema::table('documentos', function (Blueprint $table) {
            $table->foreign('idimovel')->references('id')->on('imovel')->onDelete('cascade');
        });
        Schema::table('area_externas', function (Blueprint $table) {
            $table->foreign('idimovel')->references('id')->on('imovel')->onDelete('cascade');
            $table->foreign('idtipo_area_externa')->references('id')->on('tipo_area_externas');
        });


        Schema::table('associados', function (Blueprint $table) {
            $table->foreign('idramo_atividades')->references('id')->on('ramo_atividades')->onDelete('cascade');
        });
        Schema::table('contatos', function (Blueprint $table) {
            $table->foreign('idassociado')->references('id')->on('associados')->onDelete('cascade');
            $table->foreign('idtipo_correspondencia')->references('id')->on('tipo_correspondencias')->onDelete('cascade');
        });
        Schema::table('dependentes', function (Blueprint $table) {
            $table->foreign('idassociado')->references('id')->on('associados')->onDelete('cascade');
        });
        Schema::table('emails', function (Blueprint $table) {
            $table->foreign('idcontato')->references('id')->on('contatos')->onDelete('cascade');
        });
        Schema::table('ramo_atividades', function (Blueprint $table) {
            $table->foreign('idcontato')->references('id')->on('contatos')->onDelete('cascade');
        });
        Schema::table('telefones', function (Blueprint $table) {
            $table->foreign('idcontato')->references('id')->on('contatos')->onDelete('cascade');
            $table->foreign('idtipo_telefone')->references('id')->on('tipo_telefones')->onDelete('cascade');
        });
        Schema::table('tipo_correspondencias', function (Blueprint $table) {
            $table->foreign('idcontato')->references('id')->on('contatos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
