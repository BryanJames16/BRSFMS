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
			$table->foreign('facilitiesPrimeID', 'fk_GeneralAddresses_Facilities1')->references('primeID')->on('facilities')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('residentPrimeID', 'fk_GeneralAddresses_Residents1')->references('residentPrimeID')->on('residents')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('businessPrimeID', 'fk_generaladdresses_businessregistrations1')->references('registrationPrimeID')->on('businessregistrations')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('streetID', 'fk_generaladdresses_streets1')->references('streetID')->on('streets')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('unitID', 'fk_generaladdresses_units1')->references('unitID')->on('units')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
			$table->dropForeign('fk_GeneralAddresses_Facilities1');
			$table->dropForeign('fk_GeneralAddresses_Residents1');
			$table->dropForeign('fk_generaladdresses_businessregistrations1');
			$table->dropForeign('fk_generaladdresses_streets1');
			$table->dropForeign('fk_generaladdresses_units1');
		});
	}

}
