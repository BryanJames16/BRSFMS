<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('addresses', function(Blueprint $table)
		{
			$table->integer('addressID', true);
			$table->string('city', 40)->nullable();
			$table->string('municipality', 35)->nullable();
			$table->string('province', 30)->nullable();
			$table->integer('lotID')->index('fk_Addresses_Lots1_idx');
			$table->integer('houseID')->nullable()->index('fk_Addresses_Houses1_idx');
			$table->integer('unitID')->nullable()->index('fk_Addresses_Units1_idx');
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
		Schema::drop('addresses');
	}

}
