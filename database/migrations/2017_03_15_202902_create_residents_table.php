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
			$table->integer('peoplePrimeID')->index('fk_Residents_People1_idx');
			$table->string('civilStatus', 20);
			$table->string('seniorCitizenID', 20)->nullable();
			$table->string('disabilities', 250)->nullable();
			$table->string('residentType', 10);
			$table->boolean('status');
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
