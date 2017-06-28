<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDefendantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('defendants', function(Blueprint $table)
		{
			$table->integer('defendantPrimeID', true);
			$table->integer('casePrimeID')->index('fk_Defendants_Cases1_idx');
			$table->integer('peoplePrimeID')->index('fk_Defendants_People1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('defendants');
	}

}
