<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResidentaccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('residentaccounts', function(Blueprint $table)
		{
			$table->integer('accountPrimeID', true);
			$table->string('accountID', 20);
			$table->string('username', 32);
			$table->string('password', 32);
			$table->string('accessCode', 30);
			$table->boolean('status');
			$table->boolean('archive');
			$table->integer('peoplePrimeID')->index('fk_ResidentAccounts_Residents1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('residentaccounts');
	}

}
