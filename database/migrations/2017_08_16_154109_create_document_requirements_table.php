<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentRequirementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('document_requirements', function(Blueprint $table)
		{
			$table->integer('primeID', true);
			$table->integer('documentPrimeID')->index('documentPrimeID_idx');
			$table->integer('requirementID')->index('requirementID_idx');
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
		Schema::drop('document_requirements');
	}

}
