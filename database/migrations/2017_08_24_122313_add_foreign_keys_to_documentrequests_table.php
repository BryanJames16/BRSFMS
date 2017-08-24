<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDocumentrequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('documentrequests', function(Blueprint $table)
		{
			$table->foreign('documentsPrimeID', 'documentsPrimeID')->references('primeID')->on('documents')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('residentPrimeID', 'residentPrimeID')->references('residentPrimeID')->on('residents')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('documentrequests', function(Blueprint $table)
		{
			$table->dropForeign('documentsPrimeID');
			$table->dropForeign('residentPrimeID');
		});
	}

}
