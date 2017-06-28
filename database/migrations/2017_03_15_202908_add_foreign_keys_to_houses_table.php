<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHousesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('houses', function(Blueprint $table)
		{
			$table->foreign('lotID', 'fk_Houses_Lots1')->references('lotID')->on('lots')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('houses', function(Blueprint $table)
		{
			$table->dropForeign('fk_Houses_Lots1');
		});
	}

}
