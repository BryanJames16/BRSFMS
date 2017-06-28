<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBusinesscategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('businesscategories', function(Blueprint $table)
		{
			$table->integer('categoryPrimeID', true);
			$table->string('categoryName', 30);
			$table->string('categoryDesc', 500)->nullable();
			$table->boolean('status');
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
		Schema::drop('businesscategories');
	}

}
