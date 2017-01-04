<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLancamentoRecorrentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lancamento_recorrentes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idlocalidade')->nullable();
            $table->foreign('idlocalidade')->references('id')->on('localidades')->onDelete('cascade');
            $table->unsignedInteger('idtipo_lancamento');
            $table->foreign('idtipo_lancamento')->references('id')->on('tipo_lancamentos')->onDelete('cascade');

            $table->decimal('valor', 20, 2);
            $table->enum('tipo_associacao', ['IMÓVEIS', 'PARCEIROS', 'LOCALIZAÇÃO']);
            $table->date('data_expiracao')->nullable();
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
        Schema::dropIfExists('lancamento_recorrentes');
    }
}
