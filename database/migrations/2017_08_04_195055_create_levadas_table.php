<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levadas', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('descricao');
			$table->string('duracao');
			$table->string('dificuldade');
			$table->integer('preco');
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
        Schema::dropIfExists('levadas');
    }
}
