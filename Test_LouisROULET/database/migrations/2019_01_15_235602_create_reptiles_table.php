<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReptilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reptiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('scale');
            $table->integer('animal_id')->unsigned();
			$table->foreign('animal_id')
				  ->references('id')
                  ->on('animals')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
		
        });
    } 
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reptiles', function(Blueprint $table) {
			$table->dropForeign('reptiles_animal_id_foreign');
		});
        Schema::dropIfExists('reptiles');
    }
}
