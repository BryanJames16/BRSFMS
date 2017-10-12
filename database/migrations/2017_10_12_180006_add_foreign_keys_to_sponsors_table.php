<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSponsorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sponsors', function(Blueprint $table)
		{
			$table->foreign('resiID', 'resiID')->references('residentPrimeID')->on('residents')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('sID', 'sID')->references('serviceTransactionPrimeID')->on('servicetransactions')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sponsors', function(Blueprint $table)
		{
			$table->dropForeign('resiID');
			$table->dropForeign('sID');
		});
	}

}
