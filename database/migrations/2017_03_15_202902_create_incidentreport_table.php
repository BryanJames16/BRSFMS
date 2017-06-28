<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIncidentreportTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('incidentreport', function(Blueprint $table)
		{
			$table->integer('reportPrimeID', true);
			$table->string('reportID', 20);
			$table->string('reportName', 30);
			$table->string('reportDesc', 500)->nullable();
			$table->dateTime('reportDate');
			$table->string('status', 25);
			$table->integer('accountPrimeID')->index('fk_IncidentReport_ResidentAccounts1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('incidentreport');
	}

}
