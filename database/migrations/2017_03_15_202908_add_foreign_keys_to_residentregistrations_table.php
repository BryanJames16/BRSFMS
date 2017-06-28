<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToResidentregistrationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('residentregistrations', function(Blueprint $table)
		{
			$table->foreign('employeePrimeID', 'fk_ResidentRegistrations_Employees1')->references('primeID')->on('employees')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('peoplePrimeID', 'fk_ResidentRegistrations_Residents1')->references('peoplePrimeID')->on('residents')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('residentregistrations', function(Blueprint $table)
		{
			$table->dropForeign('fk_ResidentRegistrations_Employees1');
			$table->dropForeign('fk_ResidentRegistrations_Residents1');
		});
	}

}
