<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kms', function (Blueprint $table) {
             $table->bigIncrements('id'); //big integer AUTO INCREMENT
             $table->string('name'); //string
             $table->string('age'); //string
             $table->string('weight'); //string
             $table->string('height'); //string
             $table->string('institution'); //string
             $table->string('location'); //string
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
        Schema::dropIfExists('kms');
    }
}
