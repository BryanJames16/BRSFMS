<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFacilitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('facilities', function(Blueprint $table)
		{
			$table->integer('primeID', true);
			$table->string('facilityID', 20);
			$table->string('facilityName', 30);
			$table->string('facilityDesc', 500)->nullable();
			$table->boolean('status');
			$table->boolean('archive');
			$table->integer('facilityTypeID')->index('fk_Facilities_FacilityTypes1_idx');
			$table->float('facilityDayPrice', 10, 0);
			$table->float('facilityNightPrice', 10, 0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('facilities');
	}

}
