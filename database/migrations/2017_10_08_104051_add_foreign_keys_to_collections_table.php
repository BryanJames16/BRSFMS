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
			$table->foreign('cardID', 'cardID')->references('cardID')->on('barangaycard')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('documentHeaderPrimeID', 'fk_collections_documentheaderrequests1')->references('documentRequestPrimeID')->on('documentrequests')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('peoplePrimeID', 'fk_collections_people1')->references('peoplePrimeID')->on('people')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('reservationprimeID', 'fk_collections_reservations1')->references('primeID')->on('reservations')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('residentPrimeID', 'fk_collections_residents1')->references('residentPrimeID')->on('residents')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
			$table->dropForeign('cardID');
			$table->dropForeign('fk_collections_documentheaderrequests1');
			$table->dropForeign('fk_collections_people1');
			$table->dropForeign('fk_collections_reservations1');
			$table->dropForeign('fk_collections_residents1');
		});
	}

}
