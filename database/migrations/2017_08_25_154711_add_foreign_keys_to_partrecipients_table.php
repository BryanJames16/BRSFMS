<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPartrecipientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('partrecipients', function(Blueprint $table)
		{
			$table->foreign('participantID', 'participantID')->references('participantID')->on('participants')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('recipientID', 'recipientID')->references('recipientID')->on('recipients')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('partrecipients', function(Blueprint $table)
		{
			$table->dropForeign('participantID');
			$table->dropForeign('recipientID');
		});
	}

}
