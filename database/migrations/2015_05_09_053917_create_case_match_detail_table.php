<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseMatchDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('case_match_details', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('case_detail_id');
			$table->string('image_url');
			$table->text('data');
			$table->integer('similarity');
			$table->string('photo_id');
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('case_match_details');
	}

}
