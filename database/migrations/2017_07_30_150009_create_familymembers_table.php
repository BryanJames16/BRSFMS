<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFamilymembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('familymembers', function(Blueprint $table)
		{
			$table->integer('familyMemberPrimeID', true);
			$table->integer('familyPrimeID')->index('fk_FamilyMembers_Families1_idx');
			$table->integer('peoplePrimeID')->index('fk_familyMembers_Residents1_idx');
			$table->string('memberRelation', 45);
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
		Schema::drop('familymembers');
	}

}
