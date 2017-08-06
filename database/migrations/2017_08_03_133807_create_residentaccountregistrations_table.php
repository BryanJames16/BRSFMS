<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResidentaccountregistrationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('residentaccountregistrations', function(Blueprint $table)
		{
			$table->integer('registrationID', true);
			$table->dateTime('registrationDate');
			$table->integer('accountPrimeID')->index('fk_ResidentAccountRegistrations_ResidentAccounts1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('residentaccountregistrations');
	}

}
