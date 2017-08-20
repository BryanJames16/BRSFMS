<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServicesponsorshipsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('servicesponsorships', function(Blueprint $table)
		{
			$table->integer('sponsorPrimeID', true);
			$table->dateTime('sponsorshipDate');
			$table->integer('servicePrimeID')->index('fk_ServiceSponsorships_Services1_idx');
			$table->integer('peoplePrimeID')->index('fk_ServiceSponsorships_People1_idx');
			$table->dateTime('startOfImplementation');
			$table->dateTime('endOfImplementation');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('servicesponsorships');
	}

}
