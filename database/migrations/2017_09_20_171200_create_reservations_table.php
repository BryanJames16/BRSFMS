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
			$table->string('reservationName', 30);
			$table->string('reservationDescription', 500)->nullable();
			$table->time('reservationStart');
			$table->time('reservationEnd');
			$table->date('dateReserved');
			$table->integer('peoplePrimeID')->nullable()->index('fk_Reservations_People1_idx');
			$table->integer('facilityPrimeID')->index('fk_Reservations_Facilities1_idx');
			$table->string('status', 15);
			$table->string('name', 100)->nullable();
			$table->integer('age')->nullable();
			$table->string('email', 45)->nullable();
			$table->string('contactNumber', 45)->nullable();
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
