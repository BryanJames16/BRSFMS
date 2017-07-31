<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBusinessregistrationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('businessregistrations', function(Blueprint $table)
		{
			$table->foreign('businessPrimeID', 'fk_BusinessRegistrations_Businesses1')->references('businessPrimeID')->on('businesses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('peoplePrimeID', 'fk_BusinessRegistrations_People1')->references('peoplePrimeID')->on('people')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('businessregistrations', function(Blueprint $table)
		{
			$table->dropForeign('fk_BusinessRegistrations_Businesses1');
			$table->dropForeign('fk_BusinessRegistrations_People1');
		});
	}

}
