<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function(Blueprint $table)
		{
			$table->integer('itemID', true);
			$table->string('itemName', 30);
			$table->integer('itemQuantity');
			$table->float('itemPrice', 10, 0);
			$table->string('itemDescription', 250);
			$table->boolean('quality');
			$table->integer('status');
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
		Schema::drop('items');
	}

}
