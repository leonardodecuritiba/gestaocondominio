<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLancamentoAvulsosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lancamento_avulsos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idconta_bancaria')->nullable();
            $table->foreign('idconta_bancaria')->references('id')->on('conta_bancarias')->onDelete('cascade');
            $table->unsignedInteger('idlayout_arquivo')->nullable();
            $table->foreign('idlayout_arquivo')->references('id')->on('layout_arquivos')->onDelete('cascade');
            $table->unsignedInteger('idimovel');
            $table->foreign('idimovel')->references('id')->on('imovels')->onDelete('cascade');
            $table->unsignedInteger('idtipo_lancamento');
            $table->foreign('idtipo_lancamento')->references('id')->on('tipo_lancamentos')->onDelete('cascade');

            $table->string('descricao', 100);
            $table->decimal('valor', 20, 2);
            $table->date('data_vencimento');
            $table->string('observacao', 500)->nullable();
            $table->boolean('cancelamento')->default(0);
            $table->string('motivo_cancelamento', 500)->nullable();
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
        Schema::dropIfExists('lancamento_avulsos');
    }
}
