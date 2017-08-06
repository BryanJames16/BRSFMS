<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBuildingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('buildings', function(Blueprint $table)
		{
			$table->foreign('buildingTypeID', 'buildingTypeID')->references('buildingTypeID')->on('buildingtypes')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('lotID', 'lotID')->references('lotID')->on('lots')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('buildings', function(Blueprint $table)
		{
			$table->dropForeign('buildingTypeID');
			$table->dropForeign('lotID');
		});
	}

}
