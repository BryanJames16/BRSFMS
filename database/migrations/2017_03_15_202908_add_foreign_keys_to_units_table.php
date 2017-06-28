<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUnitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('units', function(Blueprint $table)
		{
			$table->foreign('houseID', 'fk_Units_Houses1')->references('houseID')->on('houses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('lotID', 'fk_Units_Lots1')->references('lotID')->on('lots')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('units', function(Blueprint $table)
		{
			$table->dropForeign('fk_Units_Houses1');
			$table->dropForeign('fk_Units_Lots1');
		});
	}

}
