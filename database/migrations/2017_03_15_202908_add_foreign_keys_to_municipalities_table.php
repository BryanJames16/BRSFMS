<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMunicipalitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('municipalities', function(Blueprint $table)
		{
			$table->foreign('provinceID', 'fk_Municipalities_Provinces1')->references('provinceID')->on('provinces')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('municipalities', function(Blueprint $table)
		{
			$table->dropForeign('fk_Municipalities_Provinces1');
		});
	}

}
