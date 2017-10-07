<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResidentregistrationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('residentregistrations', function(Blueprint $table)
		{
			$table->integer('registrationID', true);
			$table->dateTime('registrationDate');
			$table->integer('employeePrimeID')->index('fk_ResidentRegistrations_Employees1_idx');
			$table->integer('peoplePrimeID')->index('fk_ResidentRegistrations_Residents1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('residentregistrations');
	}

}
