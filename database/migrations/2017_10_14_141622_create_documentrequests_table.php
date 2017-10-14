<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentrequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('documentrequests', function(Blueprint $table)
		{
			$table->integer('documentRequestPrimeID', true);
			$table->string('requestID', 20);
			$table->date('requestDate');
			$table->string('status', 20);
			$table->integer('residentPrimeID')->index('fk_DocumentHeaderRequests_Residents1_idx');
			$table->integer('documentsPrimeID')->index('documentPrimeID_idx');
			$table->integer('quantity');
			$table->string('remark', 200)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('documentrequests');
	}

}
