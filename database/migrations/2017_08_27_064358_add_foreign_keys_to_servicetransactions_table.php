<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToServicetransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('servicetransactions', function(Blueprint $table)
		{
			$table->foreign('servicePrimeID', 'servicePrimeID')->references('primeID')->on('services')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('servicetransactions', function(Blueprint $table)
		{
			$table->dropForeign('servicePrimeID');
		});
	}

}
