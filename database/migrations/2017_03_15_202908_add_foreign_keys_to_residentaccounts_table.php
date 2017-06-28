<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToResidentaccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('residentaccounts', function(Blueprint $table)
		{
			$table->foreign('peoplePrimeID', 'fk_ResidentAccounts_Residents1')->references('peoplePrimeID')->on('residents')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('residentaccounts', function(Blueprint $table)
		{
			$table->dropForeign('fk_ResidentAccounts_Residents1');
		});
	}

}
