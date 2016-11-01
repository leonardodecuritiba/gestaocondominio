<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDependentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependentes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idassociado');

            $table->foreign('idassociado')->references('id')->on('associados')->onDelete('cascade');

            $table->string('nome',100);
            $table->string('cpf', 30)->unique();
            $table->string('rg', 20)->unique();
            $table->enum('genero',['Masculino', 'Feminino']);
            $table->string('telefone',100);

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
        Schema::dropIfExists('dependentes');
    }
}
