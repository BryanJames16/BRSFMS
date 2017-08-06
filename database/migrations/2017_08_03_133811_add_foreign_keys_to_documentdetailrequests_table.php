<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDocumentdetailrequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('documentdetailrequests', function(Blueprint $table)
		{
			$table->foreign('headerPrimeID', 'fk_DocumentDetailRequests_DocumentHeaderRequests1')->references('documentHeaderPrimeID')->on('documentheaderrequests')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('documentPrimeID', 'fk_DocumentDetailRequests_Documents1')->references('primeID')->on('documents')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('documentdetailrequests', function(Blueprint $table)
		{
			$table->dropForeign('fk_DocumentDetailRequests_DocumentHeaderRequests1');
			$table->dropForeign('fk_DocumentDetailRequests_Documents1');
		});
	}

}
