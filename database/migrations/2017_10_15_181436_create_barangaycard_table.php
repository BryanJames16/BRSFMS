<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBarangaycardTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('barangaycard', function(Blueprint $table)
		{
			$table->integer('cardID', true);
			$table->integer('rID')->index('residentPrimeID_idx');
			$table->dateTime('expirationDate')->nullable();
			$table->dateTime('dateIssued');
			$table->boolean('released')->default(0);
			$table->boolean('status')->default(0);
			$table->integer('memID')->index('memID_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('barangaycard');
	}

}
