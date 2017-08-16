<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBuildingtypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('buildingtypes', function(Blueprint $table)
		{
			$table->integer('buildingTypeID', true);
			$table->string('buildingTypeName', 45);
			$table->boolean('status');
			$table->boolean('archive');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('buildingtypes');
	}

}
