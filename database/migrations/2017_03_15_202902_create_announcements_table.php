<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnnouncementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('announcements', function(Blueprint $table)
		{
			$table->integer('announcementID', true);
			$table->string('announcementName', 20);
			$table->string('announcementDesc', 500)->nullable();
			$table->dateTime('announcementDate');
			$table->integer('employeePrimeID')->index('fk_Announcements_Employees1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('announcements');
	}

}
