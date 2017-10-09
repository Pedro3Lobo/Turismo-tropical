<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExcursaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excursaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('descricao');
            $table->integer('preco');
            $table->date('dia');
            $table->string('hora_saida');
            $table->string('hora_regresso');
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
        Schema::dropIfExists('excursaos');
    }
}
