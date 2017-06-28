<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToIncidentreportTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('incidentreport', function(Blueprint $table)
		{
			$table->foreign('accountPrimeID', 'fk_IncidentReport_ResidentAccounts1')->references('accountPrimeID')->on('residentaccounts')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('incidentreport', function(Blueprint $table)
		{
			$table->dropForeign('fk_IncidentReport_ResidentAccounts1');
		});
	}

}
