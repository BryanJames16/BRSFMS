<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGeneraladdressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('generaladdresses', function(Blueprint $table)
		{
			$table->foreign('businessPrimeID', 'fk_GeneralAddresses_Businesses1')->references('businessPrimeID')->on('businesses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('facilitiesPrimeID', 'fk_GeneralAddresses_Facilities1')->references('primeID')->on('facilities')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('residentPrimeID', 'fk_GeneralAddresses_Residents1')->references('peoplePrimeID')->on('residents')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('addressID', 'fk_PersonAddresses_Addresses1')->references('addressID')->on('addresses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('generaladdresses', function(Blueprint $table)
		{
			$table->dropForeign('fk_GeneralAddresses_Businesses1');
			$table->dropForeign('fk_GeneralAddresses_Facilities1');
			$table->dropForeign('fk_GeneralAddresses_Residents1');
			$table->dropForeign('fk_PersonAddresses_Addresses1');
		});
	}

}
