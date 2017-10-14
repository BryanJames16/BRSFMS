<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRequestrequirementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('requestrequirements', function(Blueprint $table)
		{
			$table->foreign('documentRequestPrimeID', 'documentRequestPrimeID')->references('documentRequestPrimeID')->on('documentrequests')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('requestrequirements', function(Blueprint $table)
		{
			$table->dropForeign('documentRequestPrimeID');
		});
	}

}
