<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('documents', function(Blueprint $table)
		{
			$table->integer('primeID', true);
			$table->string('documentID', 20);
			$table->string('documentName', 30);
			$table->string('documentDescription', 500)->nullable();
			$table->string('documentContent', 500);
			$table->string('documentType', 15);
			$table->float('documentPrice', 10, 0);
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
		Schema::drop('documents');
	}

}
