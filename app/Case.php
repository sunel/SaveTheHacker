<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Case extends Model {

	protected $table = 'case_details';
	
    public $timestamps = false;

	protected $fillable = ['name', 'email', 'case_number'];

}
