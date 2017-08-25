<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartrecipientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('partrecipients', function(Blueprint $table)
		{
			$table->integer('partrecipientID', true);
			$table->integer('participantID')->index('participantID_idx');
			$table->integer('recipientID')->index('recipientID_idx');
			$table->integer('quantity');
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
		Schema::drop('partrecipients');
	}

}
