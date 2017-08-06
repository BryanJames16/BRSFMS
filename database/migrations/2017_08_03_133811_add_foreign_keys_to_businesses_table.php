<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBusinessesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('businesses', function(Blueprint $table)
		{
			$table->foreign('categoryPrimeID', 'fk_Businesses_BusinessCategory1')->references('categoryPrimeID')->on('businesscategories')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('businesses', function(Blueprint $table)
		{
			$table->dropForeign('fk_Businesses_BusinessCategory1');
		});
	}

}
