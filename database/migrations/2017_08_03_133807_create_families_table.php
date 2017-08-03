<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFamiliesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('families', function(Blueprint $table)
		{
			$table->integer('familyPrimeID', true);
			$table->string('familyID', 20);
			$table->integer('familyHeadID')->index('familyHeadID_idx');
			$table->string('familyName', 30)->nullable();
			$table->date('familyRegistrationDate')->nullable();
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
		Schema::drop('families');
	}

}
