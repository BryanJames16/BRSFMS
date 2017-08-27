<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRequestrequirementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('requestrequirements', function(Blueprint $table)
		{
			$table->integer('requestrequirementsID', true);
			$table->integer('documentRequestPrimeID')->index('documentRequestPrimeID_idx');
			$table->boolean('archive')->default(0);
			$table->integer('requirementID')->index('requirementID_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('requestrequirements');
	}

}
