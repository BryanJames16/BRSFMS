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
			$table->string('businessID', 20);
			$table->string('originalName', 45);
			$table->string('tradeName', 45);
			$table->integer('residentPrimeID')->nullable()->index('fk_businessregistrations_residents1_idx');
			$table->dateTime('registrationDate');
			$table->dateTime('removalDate')->nullable();
			$table->integer('archive');
			$table->string('address', 250);
			$table->string('firstName', 45)->nullable();
			$table->string('middleName', 45)->nullable();
			$table->string('lastName', 45)->nullable();
			$table->string('contactNumber', 45)->nullable();
			$table->date('birthday')->nullable();
			$table->string('gender', 5)->nullable();
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
