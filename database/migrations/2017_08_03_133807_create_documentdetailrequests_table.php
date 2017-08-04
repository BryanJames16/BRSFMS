<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentdetailrequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('documentdetailrequests', function(Blueprint $table)
		{
			$table->integer('documentDetailPrimeID', true);
			$table->integer('headerPrimeID')->index('fk_DocumentDetailRequests_DocumentHeaderRequests1_idx');
			$table->integer('documentPrimeID')->index('fk_DocumentDetailRequests_Documents1_idx');
			$table->integer('quantity');
			$table->primary(['documentDetailPrimeID','headerPrimeID']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('documentdetailrequests');
	}

}
