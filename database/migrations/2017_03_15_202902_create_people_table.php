<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePeopleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('people', function(Blueprint $table)
		{
			$table->integer('peoplePrimeID', true);
			$table->string('personID', 20);
			$table->string('firstName', 30);
			$table->string('middleName', 30);
			$table->string('lastName', 30);
			$table->string('suffix', 5)->nullable();
			$table->string('contactNumber', 14);
			$table->char('gender', 1);
			$table->date('birthDate');
			$table->boolean('status');
			$table->boolean('archive');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('people');
	}

}
