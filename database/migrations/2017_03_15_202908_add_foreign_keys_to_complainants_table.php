<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToComplainantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('complainants', function(Blueprint $table)
		{
			$table->foreign('casePrimeID', 'fk_Complainants_Cases1')->references('casePrimeID')->on('cases')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('peoplePrimeID', 'fk_Complainants_People1')->references('peoplePrimeID')->on('people')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('complainants', function(Blueprint $table)
		{
			$table->dropForeign('fk_Complainants_Cases1');
			$table->dropForeign('fk_Complainants_People1');
		});
	}

}
