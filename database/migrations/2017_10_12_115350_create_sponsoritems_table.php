<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSponsoritemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sponsoritems', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('sponsorID')->index('sponsorID_idx');
			$table->string('itemName', 45);
			$table->integer('quantity');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sponsoritems');
	}

}
