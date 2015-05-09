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
			$table->increments('case_detail_id');
			$table->string('image_url');
			$table->text('data');
			$table->integer('similarity');
			
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
