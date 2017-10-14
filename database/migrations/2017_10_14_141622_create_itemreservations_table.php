<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemreservationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('itemreservations', function(Blueprint $table)
		{
			$table->integer('primeID', true);
			$table->string('reservationName', 30);
			$table->string('reservationDescription', 500);
			$table->time('reservationStart');
			$table->time('reservationEnd');
			$table->date('dateReserved');
			$table->integer('peoplePrimeID')->nullable();
			$table->integer('itemID');
			$table->integer('itemQuantity');
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
		Schema::drop('itemreservations');
	}

}
