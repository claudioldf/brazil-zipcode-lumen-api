<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeighborhoodTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('neighborhoods', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('state_id');
			$table->integer('city_id');
			$table->string('name');

			$table->index(['city_id', 'state_id']);
			$table->index('name');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
			Schema::dropIfExists('neighborhoods');
	}
}
