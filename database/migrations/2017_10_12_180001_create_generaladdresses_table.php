<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGeneraladdressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('generaladdresses', function(Blueprint $table)
		{
			$table->integer('personAddressID', true);
			$table->string('addressType', 30);
			$table->integer('residentPrimeID')->nullable()->index('fk_GeneralAddresses_Residents1_idx');
			$table->integer('facilitiesPrimeID')->nullable()->index('fk_GeneralAddresses_Facilities1_idx');
			$table->integer('businessPrimeID')->nullable()->index('fk_generaladdresses_businessregistrations1_idx');
			$table->integer('unitID')->nullable()->index('fk_generaladdresses_units1_idx');
			$table->integer('streetID')->nullable()->index('fk_generaladdresses_streets1_idx');
			$table->integer('lotID')->nullable()->index('lotID_idx');
			$table->integer('buildingID')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('generaladdresses');
	}

}
