<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStreetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('streets', function(Blueprint $table)
		{
			$table->foreign('barangayID', 'fk_Streets_Barangays1')->references('barangayID')->on('barangays')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('streets', function(Blueprint $table)
		{
			$table->dropForeign('fk_Streets_Barangays1');
		});
	}

}
