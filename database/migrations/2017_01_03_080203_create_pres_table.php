<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pres', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idlancamento');
            $table->foreign('idlancamento')->references('id')->on('lancamentos')->onDelete('cascade');

            $table->decimal('valor_desconto', 20, 2)->nullable();
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
        Schema::dropIfExists('pres');
    }
}
