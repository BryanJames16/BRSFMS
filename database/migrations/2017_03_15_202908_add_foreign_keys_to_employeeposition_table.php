<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEmployeepositionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('employeeposition', function(Blueprint $table)
		{
			$table->foreign('employeePrimeID', 'fk_EmployeePosition_Employees1')->references('primeID')->on('employees')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('employeeposition', function(Blueprint $table)
		{
			$table->dropForeign('fk_EmployeePosition_Employees1');
		});
	}

}
