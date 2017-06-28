<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUnitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('units', function(Blueprint $table)
		{
			$table->integer('unitID', true);
			$table->string('unitCode', 8);
			$table->integer('lotID')->index('fk_Units_Lots1_idx');
			$table->boolean('status');
			$table->boolean('archive');
			$table->integer('houseID')->nullable()->index('fk_Units_Houses1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('units');
	}

}
