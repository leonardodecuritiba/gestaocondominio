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
            $table->unsignedInteger('idlancamento_avulso')->nullable();
            $table->foreign('idlancamento_avulso')->references('id')->on('lancamento_avulsos')->onDelete('cascade');
            $table->unsignedInteger('idpre_lancamento')->nullable();
            $table->foreign('idpre_lancamento')->references('id')->on('pre_lancamentos')->onDelete('cascade');

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
