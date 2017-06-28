<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResidentbackgroundsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('residentbackgrounds', function(Blueprint $table)
		{
			$table->integer('backgroundPrimeID', true);
			$table->string('currentWork', 40);
			$table->string('monthlyIncome', 40);
			$table->integer('peoplePrimeID')->index('fk_residentBackgrounds_Residents1_idx');
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
		Schema::drop('residentbackgrounds');
	}

}
