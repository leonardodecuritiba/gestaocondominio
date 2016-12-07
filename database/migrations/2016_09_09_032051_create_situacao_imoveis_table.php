<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSituacaoImoveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('situacao_imoveis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao',100);
            $table->decimal('percentual_desconto', 11, 2);
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
        Schema::dropIfExists('situacao_imoveis');
    }
}
