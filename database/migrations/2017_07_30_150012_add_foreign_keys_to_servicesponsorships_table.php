<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToServicesponsorshipsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('servicesponsorships', function(Blueprint $table)
		{
			$table->foreign('peoplePrimeID', 'fk_ServiceSponsorships_People1')->references('peoplePrimeID')->on('people')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('servicePrimeID', 'fk_ServiceSponsorships_Services1')->references('primeID')->on('services')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('servicesponsorships', function(Blueprint $table)
		{
			$table->dropForeign('fk_ServiceSponsorships_People1');
			$table->dropForeign('fk_ServiceSponsorships_Services1');
		});
	}

}
