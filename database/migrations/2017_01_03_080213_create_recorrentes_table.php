<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecorrentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recorrentes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idlancamento');
            $table->foreign('idlancamento')->references('id')->on('lancamentos')->onDelete('cascade');
            $table->unsignedInteger('idlocalidade');
            $table->foreign('idlocalidade')->references('id')->on('localidades')->onDelete('cascade');

            $table->enum('tipo', ['IMOVEIS', 'PARCEIROS', 'LOCALIZACAO']);
            $table->decimal('valor_desconto', 20, 2)->nullable();
            $table->string('descricao_desconto', 200)->nullable();
            $table->boolean('fixo')->default(0);
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
        Schema::dropIfExists('recorrentes');
    }
}
