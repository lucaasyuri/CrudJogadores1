<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableJogadores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jogadores', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100)->nullable(false);
            $table->string('posicao', 50)->nullable(false);
            $table->unsignedBigInteger('numero')->nullable(false);
            $table->string('pais', 100)->nullable(false);
            $table->timestamp('nascimento')->nullable();
            $table->unsignedBigInteger('time_id');
            $table->foreign('time_id')->references('id')->on('times');
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
        Schema::dropIfExists('jogadores');
    }
}
