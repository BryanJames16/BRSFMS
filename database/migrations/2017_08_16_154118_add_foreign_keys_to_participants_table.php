<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToParticipantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('participants', function(Blueprint $table)
		{
			$table->foreign('residentID', 'residentID')->references('residentPrimeID')->on('residents')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('serviceTransactionPrimeID', 'serviceTransactionPrimeID')->references('serviceTransactionPrimeID')->on('servicetransactions')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('participants', function(Blueprint $table)
		{
			$table->dropForeign('residentID');
			$table->dropForeign('serviceTransactionPrimeID');
		});
	}

}
