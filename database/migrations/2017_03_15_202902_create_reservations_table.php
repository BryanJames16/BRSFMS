<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReservationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reservations', function(Blueprint $table)
		{
			$table->integer('primeID', true);
			$table->dateTime('reservationsStart');
			$table->dateTime('reservationEnd');
			$table->dateTime('dateReserved');
			$table->string('status', 10);
			$table->integer('peoplePrimeID')->index('fk_Reservations_People1_idx');
			$table->integer('facilityPrimeID')->index('fk_Reservations_Facilities1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reservations');
	}

}
