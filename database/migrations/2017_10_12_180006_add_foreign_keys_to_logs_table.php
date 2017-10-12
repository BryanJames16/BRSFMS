<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('logs', function(Blueprint $table)
		{
			$table->foreign('businessID', 'businessID')->references('registrationPrimeID')->on('businessregistrations')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('collectionID', 'collectionID')->references('collectionPrimeID')->on('collections')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('famID', 'famID')->references('familyPrimeID')->on('families')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('requestID', 'requestID')->references('documentRequestPrimeID')->on('documentrequests')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('resID', 'resID')->references('residentPrimeID')->on('residents')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('reservationID', 'reservationID')->references('primeID')->on('reservations')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('servTransactionPrimeID', 'servTransactionPrimeID')->references('serviceTransactionPrimeID')->on('servicetransactions')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('userID', 'userID')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('logs', function(Blueprint $table)
		{
			$table->dropForeign('businessID');
			$table->dropForeign('collectionID');
			$table->dropForeign('famID');
			$table->dropForeign('requestID');
			$table->dropForeign('resID');
			$table->dropForeign('reservationID');
			$table->dropForeign('servTransactionPrimeID');
			$table->dropForeign('userID');
		});
	}

}
