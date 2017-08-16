<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServicetransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('servicetransactions', function(Blueprint $table)
		{
			$table->integer('serviceTransactionPrimeID', true);
			$table->string('serviceTransactionID', 45);
			$table->string('serviceName', 100);
			$table->integer('servicePrimeID')->index('servicePrimeID_idx');
			$table->integer('fromAge');
			$table->integer('toAge');
			$table->date('fromDate');
			$table->date('toDate');
			$table->string('status', 40)->default('Pending');
			$table->boolean('archive')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('servicetransactions');
	}

}
