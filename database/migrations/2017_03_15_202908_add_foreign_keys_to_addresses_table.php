<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('addresses', function(Blueprint $table)
		{
			$table->foreign('houseID', 'fk_Addresses_Houses1')->references('houseID')->on('houses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('lotID', 'fk_Addresses_Lots1')->references('lotID')->on('lots')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('unitID', 'fk_Addresses_Units1')->references('unitID')->on('units')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('addresses', function(Blueprint $table)
		{
			$table->dropForeign('fk_Addresses_Houses1');
			$table->dropForeign('fk_Addresses_Lots1');
			$table->dropForeign('fk_Addresses_Units1');
		});
	}

}
