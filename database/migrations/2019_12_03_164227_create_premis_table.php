<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePremisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('type_id');
            $table->integer('price')->nullable();
            $table->integer('premi_1')->nullable();
            $table->integer('premi_2')->nullable();
            $table->integer('premi_3')->nullable();
            $table->integer('premi_4')->nullable();
            $table->integer('premi_5')->nullable();
            $table->integer('premi_6')->nullable();
            $table->integer('premi_7')->nullable();
            $table->integer('premi_8')->nullable();
            $table->integer('cost_premi')->nullable();
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
        Schema::dropIfExists('premis');
    }
}
