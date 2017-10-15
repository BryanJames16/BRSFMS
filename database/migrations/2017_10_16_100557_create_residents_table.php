<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResidentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('residents', function(Blueprint $table)
		{
			$table->integer('residentPrimeID', true);
			$table->string('residentID', 20);
			$table->string('firstName', 30);
			$table->string('middleName', 30);
			$table->string('lastName', 30);
			$table->string('suffix', 5)->nullable();
			$table->string('contactNumber', 14);
			$table->char('gender', 1);
			$table->date('birthDate');
			$table->string('civilStatus', 20);
			$table->string('seniorCitizenID', 20)->nullable();
			$table->string('disabilities', 250)->nullable();
			$table->string('residentType', 10);
			$table->boolean('status');
			$table->string('imagePath', 500)->nullable();
			$table->string('address', 250);
			$table->string('email', 50)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('residents');
	}

}
