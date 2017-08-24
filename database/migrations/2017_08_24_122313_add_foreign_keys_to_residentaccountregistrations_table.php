<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToResidentaccountregistrationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('residentaccountregistrations', function(Blueprint $table)
		{
			$table->foreign('accountPrimeID', 'fk_ResidentAccountRegistrations_ResidentAccounts1')->references('accountPrimeID')->on('residentaccounts')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('residentaccountregistrations', function(Blueprint $table)
		{
			$table->dropForeign('fk_ResidentAccountRegistrations_ResidentAccounts1');
		});
	}

}
