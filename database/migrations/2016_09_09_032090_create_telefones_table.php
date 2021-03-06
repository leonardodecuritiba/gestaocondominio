<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelefonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idcontato');
            $table->unsignedInteger('idtipo_telefone');

            $table->foreign('idcontato')->references('id')->on('contatos')->onDelete('cascade');
            $table->foreign('idtipo_telefone')->references('id')->on('tipo_telefones')->onDelete('cascade');

            $table->string('numero',20);
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
        Schema::dropIfExists('telefones');
    }
}
