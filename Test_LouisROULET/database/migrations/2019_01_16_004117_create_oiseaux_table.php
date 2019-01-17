<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOiseauxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oiseaux', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('feathers');
            $table->integer('animal_id')->unsigned();
			$table->foreign('animal_id')
				  ->references('id')
				  ->on('animals')
				  ->onDelete('restrict')
				  ->onUpdate('restrict');
		
        });
    } 
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oiseaux', function(Blueprint $table) {
			$table->dropForeign('oiseaux_animal_id_foreign');
		});
        Schema::dropIfExists('oiseaux');
    }
}
