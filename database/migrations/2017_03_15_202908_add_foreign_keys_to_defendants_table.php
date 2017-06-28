<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDefendantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('defendants', function(Blueprint $table)
		{
			$table->foreign('casePrimeID', 'fk_Defendants_Cases1')->references('casePrimeID')->on('cases')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('peoplePrimeID', 'fk_Defendants_People1')->references('peoplePrimeID')->on('people')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('defendants', function(Blueprint $table)
		{
			$table->dropForeign('fk_Defendants_Cases1');
			$table->dropForeign('fk_Defendants_People1');
		});
	}

}
