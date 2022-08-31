<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTimes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('times', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50)->unique()->nullable(false); //unique: sem valor repetido, nullable(false): não permite valor nullo
            $table->unsignedBigInteger('ano_fundacao')->nullable(false);  // não permite numeros com sinais, ous seja, não permite numeros negativos
            $table->string('pais', 100)->nullable(false);
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
        Schema::dropIfExists('times');
    }
}
