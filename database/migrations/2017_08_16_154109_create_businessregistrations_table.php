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
			$table->string('originalName', 45);
			$table->string('tradeName', 45);
			$table->integer('peoplePrimeID')->index('fk_BusinessRegistrations_People1_idx');
			$table->dateTime('registrationDate');
			$table->dateTime('removalDate')->nullable();
			$table->integer('archive');
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
