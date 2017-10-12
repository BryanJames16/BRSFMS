<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToReservationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('reservations', function(Blueprint $table)
		{
			$table->foreign('facilityPrimeID', 'fk_Reservations_Facilities1')->references('primeID')->on('facilities')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('peoplePrimeID', 'peoplePrimeID')->references('residentPrimeID')->on('residents')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('reservations', function(Blueprint $table)
		{
			$table->dropForeign('fk_Reservations_Facilities1');
			$table->dropForeign('peoplePrimeID');
		});
	}

}
