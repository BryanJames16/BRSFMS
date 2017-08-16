<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUtilitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('utilities', function(Blueprint $table)
		{
			$table->integer('utilityID', true);
			$table->string('barangayName', 50);
			$table->string('chairmanName', 50);
			$table->string('address', 100);
			$table->string('brgyLogoPath', 250);
			$table->string('provLogoPath', 250);
			$table->string('facilityPK', 30);
			$table->string('documentPK', 30);
			$table->string('servicePK', 30);
			$table->string('residentPK', 30);
			$table->string('familyPK', 30);
			$table->string('docRequestPK', 30);
			$table->string('docApprovalPK', 30);
			$table->string('reservationPK', 30);
			$table->string('serviceRegPK', 30);
			$table->string('sponsorPK', 30);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('utilities');
	}

}
