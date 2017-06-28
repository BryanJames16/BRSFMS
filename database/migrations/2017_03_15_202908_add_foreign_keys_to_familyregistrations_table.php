<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFamilyregistrationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('familyregistrations', function(Blueprint $table)
		{
			$table->foreign('familyPrimeID', 'fk_FamilyRegistrations_Families1')->references('familyPrimeID')->on('families')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('familyregistrations', function(Blueprint $table)
		{
			$table->dropForeign('fk_FamilyRegistrations_Families1');
		});
	}

}
