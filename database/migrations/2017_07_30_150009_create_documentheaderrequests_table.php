<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentheaderrequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('documentheaderrequests', function(Blueprint $table)
		{
			$table->integer('documentHeaderPrimeID', true);
			$table->string('requestID', 20);
			$table->date('requestDate');
			$table->string('status', 20);
			$table->integer('peoplePrimeID')->index('fk_DocumentHeaderRequests_Residents1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('documentheaderrequests');
	}

}
