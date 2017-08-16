<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDocumentRequirementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('document_requirements', function(Blueprint $table)
		{
			$table->foreign('documentPrimeID', 'documentPrimeID')->references('primeID')->on('documents')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('requirementID', 'requirementID')->references('requirementID')->on('requirements')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('document_requirements', function(Blueprint $table)
		{
			$table->dropForeign('documentPrimeID');
			$table->dropForeign('requirementID');
		});
	}

}
