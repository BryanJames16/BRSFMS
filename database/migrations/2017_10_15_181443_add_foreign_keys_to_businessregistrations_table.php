<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBusinessregistrationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('businessregistrations', function(Blueprint $table)
		{
			$table->foreign('categoryID', 'categoryID')->references('categoryPrimeID')->on('businesscategories')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('residentPrimeID', 'fk_businessregistrations_residents1')->references('residentPrimeID')->on('residents')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('businessregistrations', function(Blueprint $table)
		{
			$table->dropForeign('categoryID');
			$table->dropForeign('fk_businessregistrations_residents1');
		});
	}

}
