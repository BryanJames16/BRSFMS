<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeepositionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employeeposition', function(Blueprint $table)
		{
			$table->integer('positionID', true);
			$table->string('positionName', 30);
			$table->date('positionDate');
			$table->integer('positionLevel');
			$table->boolean('status');
			$table->boolean('archive');
			$table->integer('employeePrimeID')->index('fk_EmployeePosition_Employees1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('employeeposition');
	}

}
