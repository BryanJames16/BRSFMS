<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFamilymembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('familymembers', function(Blueprint $table)
		{
			$table->foreign('familyPrimeID', 'fk_FamilyMembers_Families1')->references('familyPrimeID')->on('families')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('peoplePrimeID', 'fk_familyMembers_Residents1')->references('peoplePrimeID')->on('residents')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('familymembers', function(Blueprint $table)
		{
			$table->dropForeign('fk_FamilyMembers_Families1');
			$table->dropForeign('fk_familyMembers_Residents1');
		});
	}

}
