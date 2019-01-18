<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMammiferesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mammiferes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('fur');
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
        Schema::table('mammiferes', function(Blueprint $table) {
			$table->dropForeign('mammiferes_animal_id_foreign');
		});
        Schema::dropIfExists('mammiferes');
    }
}
