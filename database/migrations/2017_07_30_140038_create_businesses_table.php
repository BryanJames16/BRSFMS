<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBusinessesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('businesses', function(Blueprint $table)
		{
			$table->integer('businessPrimeID', true);
			$table->string('businessID', 20);
			$table->string('businessName', 30);
			$table->string('businessDesc', 500)->nullable();
			$table->string('businessType', 12);
			$table->integer('categoryPrimeID')->index('fk_Businesses_BusinessCategory1_idx');
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
		Schema::drop('businesses');
	}

}
