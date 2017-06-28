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
			$table->integer('addressID')->index('fk_PersonAddresses_Addresses1_idx');
			$table->string('addressType', 30);
			$table->boolean('status');
			$table->boolean('archive');
			$table->integer('residentPrimeID')->nullable()->index('fk_GeneralAddresses_Residents1_idx');
			$table->integer('facilitiesPrimeID')->nullable()->index('fk_GeneralAddresses_Facilities1_idx');
			$table->integer('businessPrimeID')->nullable()->index('fk_GeneralAddresses_Businesses1_idx');
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
