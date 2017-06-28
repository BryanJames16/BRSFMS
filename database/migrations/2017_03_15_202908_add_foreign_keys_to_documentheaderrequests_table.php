<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDocumentheaderrequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('documentheaderrequests', function(Blueprint $table)
		{
			$table->foreign('peoplePrimeID', 'fk_DocumentHeaderRequests_Residents1')->references('peoplePrimeID')->on('residents')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('documentheaderrequests', function(Blueprint $table)
		{
			$table->dropForeign('fk_DocumentHeaderRequests_Residents1');
		});
	}

}
