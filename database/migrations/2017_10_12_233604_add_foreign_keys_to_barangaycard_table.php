<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBarangaycardTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('barangaycard', function(Blueprint $table)
		{
			$table->foreign('memID', 'memID')->references('familyMemberPrimeID')->on('familymembers')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('rID', 'rID')->references('residentPrimeID')->on('residents')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('barangaycard', function(Blueprint $table)
		{
			$table->dropForeign('memID');
			$table->dropForeign('rID');
		});
	}

}
