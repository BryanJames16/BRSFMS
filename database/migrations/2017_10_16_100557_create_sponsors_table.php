<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSponsorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sponsors', function(Blueprint $table)
		{
			$table->integer('sponsorID', true);
			$table->integer('resiID')->nullable()->index('rID_idx');
			$table->integer('sID')->index('sID_idx');
			$table->dateTime('dateSponsored');
			$table->string('firstName', 45)->nullable();
			$table->string('middleName', 45)->nullable();
			$table->string('lastName', 45)->nullable();
			$table->string('email', 45)->nullable();
			$table->string('contactNumber', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sponsors');
	}

}
