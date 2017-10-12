<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('logs', function(Blueprint $table)
		{
			$table->integer('logID', true);
			$table->integer('userID')->index('userID_idx');
			$table->string('action', 100);
			$table->integer('resID')->nullable()->index('residentPrimeID_idx');
			$table->integer('famID')->nullable()->index('famID_idx');
			$table->integer('requestID')->nullable()->index('requestID_idx');
			$table->integer('reservationID')->nullable()->index('reservationID_idx');
			$table->integer('collectionID')->nullable()->index('collectionID_idx');
			$table->integer('servTransactionPrimeID')->nullable()->index('servicePrimeID_idx');
			$table->integer('businessID')->nullable()->index('businessID_idx');
			$table->dateTime('dateOfAction');
			$table->string('type', 20)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('logs');
	}

}
