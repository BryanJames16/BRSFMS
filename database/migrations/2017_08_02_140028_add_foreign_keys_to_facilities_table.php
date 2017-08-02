<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFacilitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('facilities', function(Blueprint $table)
		{
			$table->foreign('facilityTypeID', 'fk_Facilities_FacilityTypes1')->references('typeID')->on('facilitytypes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('facilities', function(Blueprint $table)
		{
			$table->dropForeign('fk_Facilities_FacilityTypes1');
		});
	}

}
