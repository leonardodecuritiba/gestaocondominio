<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssociadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associados', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('idcontato');
            $table->unsignedInteger('idramo_atividades');

            $table->foreign('idramo_atividades')->references('id')->on('ramo_atividades')->onDelete('cascade');
            $table->foreign('idcontato')->references('id')->on('contatos')->onDelete('cascade');

            $table->string('nome',200);
            $table->string('cpf',30)->unique();
            $table->string('rg',20)->unique();
            $table->enum('natureza',['Pessoa Física', 'Pessoa Jurídica']);
            $table->string('nome_mae',100);
            $table->string('nome_pai',100);
            $table->date('data_nascimento');

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
        Schema::dropIfExists('associados');
    }
}
