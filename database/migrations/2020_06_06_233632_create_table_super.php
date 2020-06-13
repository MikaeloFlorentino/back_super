<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSuper extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('supers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('area_super');
            $table->string('area_casa');
            $table->string('atiende');
            $table->string('articulo');
            $table->boolean('comprado');
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
        //
        Schema::dropIfExists('super');
    }
}
