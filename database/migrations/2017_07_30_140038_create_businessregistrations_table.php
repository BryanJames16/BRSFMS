<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBusinessregistrationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('businessregistrations', function(Blueprint $table)
		{
			$table->integer('registrationPrimeID', true);
			$table->string('registrationID', 20);
			$table->dateTime('registrationDate');
			$table->integer('businessPrimeID')->index('fk_BusinessRegistrations_Businesses1_idx');
			$table->integer('peoplePrimeID')->index('fk_BusinessRegistrations_People1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('businessregistrations');
	}

}
