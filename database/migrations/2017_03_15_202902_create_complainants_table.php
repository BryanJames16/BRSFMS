<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateComplainantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('complainants', function(Blueprint $table)
		{
			$table->integer('complainantPrimeID', true);
			$table->integer('casePrimeID')->index('fk_Complainants_Cases1_idx');
			$table->integer('peoplePrimeID')->index('fk_Complainants_People1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('complainants');
	}

}
