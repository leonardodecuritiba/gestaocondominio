<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLancamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lancamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idtipo_lancamento');
            $table->foreign('idtipo_lancamento')->references('id')->on('tipo_lancamentos')->onDelete('cascade');

            $table->string('descricao', 100);
            $table->decimal('valor', 20, 2);
            $table->date('data_vencimento');
            $table->enum('tipo', ['AVULSO', 'PRE', 'RECORRENTE']);
            $table->string('observacao', 500)->nullable();
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
        Schema::dropIfExists('lancamentos');
    }
}
