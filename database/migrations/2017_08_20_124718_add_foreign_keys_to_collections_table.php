<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCollectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('collections', function(Blueprint $table)
		{
			$table->foreign('documentHeaderPrimeID', 'fk_collections_documentheaderrequests1')->references('documentHeaderPrimeID')->on('documentheaderrequests')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('people_peoplePrimeID', 'fk_collections_people1')->references('peoplePrimeID')->on('people')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('reservationprimeID', 'fk_collections_reservations1')->references('primeID')->on('reservations')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('residents_residentPrimeID', 'fk_collections_residents1')->references('residentPrimeID')->on('residents')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('collections', function(Blueprint $table)
		{
			$table->dropForeign('fk_collections_documentheaderrequests1');
			$table->dropForeign('fk_collections_people1');
			$table->dropForeign('fk_collections_reservations1');
			$table->dropForeign('fk_collections_residents1');
		});
	}

}
