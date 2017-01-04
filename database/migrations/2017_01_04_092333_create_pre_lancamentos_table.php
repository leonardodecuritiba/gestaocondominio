<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreLancamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_lancamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idimovel');
            $table->foreign('idimovel')->references('id')->on('imovels')->onDelete('cascade');
            $table->unsignedInteger('idtipo_lancamento');
            $table->foreign('idtipo_lancamento')->references('id')->on('tipo_lancamentos')->onDelete('cascade');

            $table->string('descricao', 100);
            $table->decimal('valor', 20, 2);
            $table->string('observacao', 500)->nullable();
            $table->boolean('cancelamento')->default(0);
            $table->decimal('valor_desconto', 20, 2)->default(0);
            $table->string('descricao_desconto', 200)->nullable();
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
        Schema::dropIfExists('pre_lancamentos');
    }
}
