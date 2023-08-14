<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda_bd', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titulo',50);
            $table->dateTime('data_inicial');
            $table->dateTime('datetime');
            $table->string('descricao',50);
            $table->string('cliente',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agenda_bd');
    }
}
