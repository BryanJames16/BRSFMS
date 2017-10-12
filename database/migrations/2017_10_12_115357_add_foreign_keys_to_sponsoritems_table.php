<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSponsoritemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sponsoritems', function(Blueprint $table)
		{
			$table->foreign('sponsorID', 'sponsorID')->references('sponsorID')->on('sponsors')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sponsoritems', function(Blueprint $table)
		{
			$table->dropForeign('sponsorID');
		});
	}

}
