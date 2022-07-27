<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         // ['name', 'description', 'company', 'yearcreation', 'numplayers', 'pathexe', 'urllogo', 'urlcover']
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->longText('description');
            $table->string('company',50);
            $table->integer('yearcreation')->length(4)->unsigned();
            $table->integer('numplayers')->length(3)->unsigned();
            $table->string('pathexe',255);
            $table->string('urllogo',255);
            $table->string('urlcover',255);
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
        Schema::dropIfExists('games');
    }
};
