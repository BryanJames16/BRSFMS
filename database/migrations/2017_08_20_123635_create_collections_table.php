<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCollectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('collections', function(Blueprint $table)
		{
			$table->integer('collectionPrimeID', true);
			$table->string('collectionID', 20);
			$table->integer('collectionType');
			$table->float('amount', 10, 0);
			$table->string('status', 20);
			$table->integer('reservationprimeID')->nullable()->index('fk_collections_reservations1_idx');
			$table->integer('documentHeaderPrimeID')->nullable()->index('fk_collections_documentheaderrequests1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('collections');
	}

}
