<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecebimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recebimentos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idlancamento');
            $table->foreign('idlancamento')->references('id')->on('lancamentos')->onDelete('cascade');
            $table->unsignedInteger('idconta_bancaria');
            $table->foreign('idconta_bancaria')->references('id')->on('conta_bancarias')->onDelete('cascade');
            $table->unsignedInteger('idlayout_arquivo')->nullable();
            $table->foreign('idlayout_arquivo')->references('id')->on('layout_arquivos')->onDelete('cascade');
            $table->unsignedInteger('idimovel')->nullable();
            $table->foreign('idimovel')->references('id')->on('imovels')->onDelete('cascade');
            $table->unsignedInteger('idassociado')->nullable();
            $table->foreign('idassociado')->references('id')->on('associados')->onDelete('cascade');

            $table->enum('forma_pagamento', ['DINHEIRO', 'CHEQUE', 'TITULO'])->nullable();
            $table->date('data_agendamento')->nullable();
            $table->decimal('valor_adicional', 20, 2)->nullable();
            $table->string('descricao_acrescimo', 200)->nullable();
            //cheque/título
            $table->integer('numero_parcelas')->nullable();
            $table->decimal('valor_abatimento', 20, 2)->nullable();
            $table->date('data_recebimento')->nullable();
            $table->string('numero_comprovante', 50)->nullable();
            //cheque
            $table->date('data_emissao')->nullable();
            $table->date('data_predatado')->nullable();
            $table->string('codigo_banco', 10)->nullable();
            $table->string('agencia', 20)->nullable();
            $table->string('numero_cheque', 50)->nullable();
            //cheque/boleto
            $table->date('data_vencimento')->nullable();

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
        Schema::dropIfExists('recebimentos');
    }
}
