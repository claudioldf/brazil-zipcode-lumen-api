<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('addresses', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('neighborhood_id');
      $table->integer('city_id');
      $table->integer('state_id');
      $table->string('name');
      $table->string('zipcode');

      $table->index(['city_id', 'state_id', 'neighborhood_id', 'zipcode', 'name'], 'searchx');
    });

    DB::statement('ALTER TABLE addresses ADD FULLTEXT full(name)'); // eloquent não tem funçao para fulltext index
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('addresses');
  }
}
