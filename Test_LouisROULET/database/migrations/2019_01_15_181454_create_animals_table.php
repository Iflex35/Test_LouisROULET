<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        {
            Schema::create('animals', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->unique();
                $table->string('type')->default('reptile');
                $table->string('descr',100);
               
                $table->rememberToken();
                $table->timestamps();
            });
        } 
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
