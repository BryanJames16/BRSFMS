<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFamilyregistrationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('familyregistrations', function(Blueprint $table)
		{
			$table->integer('primeID', true);
			$table->string('registrationID', 20);
			$table->date('registrationDate');
			$table->integer('familyPrimeID')->index('fk_FamilyRegistrations_Families1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('familyregistrations');
	}

}
