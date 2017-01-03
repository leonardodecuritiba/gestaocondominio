<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvulsosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avulsos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idlancamento');
            $table->foreign('idlancamento')->references('id')->on('lancamentos')->onDelete('cascade');

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
        Schema::dropIfExists('avulsos');
    }
}
