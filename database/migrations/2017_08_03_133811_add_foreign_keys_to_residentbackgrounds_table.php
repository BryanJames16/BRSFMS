<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToResidentbackgroundsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('residentbackgrounds', function(Blueprint $table)
		{
			$table->foreign('peoplePrimeID', 'fk_residentBackgrounds_Residents1')->references('residentPrimeID')->on('residents')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('residentbackgrounds', function(Blueprint $table)
		{
			$table->dropForeign('fk_residentBackgrounds_Residents1');
		});
	}

}
