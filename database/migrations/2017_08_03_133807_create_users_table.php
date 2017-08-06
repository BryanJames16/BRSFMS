<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 45);
			$table->string('email', 45);
			$table->text('password');
			$table->timestamps();
			$table->text('remember_token')->nullable();
			$table->string('firstName', 45);
			$table->string('middleName', 45)->nullable();
			$table->string('lastName', 45);
			$table->string('suffix', 10)->nullable();
			$table->string('imagePath', 200)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
