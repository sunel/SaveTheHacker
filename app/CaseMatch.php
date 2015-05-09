<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CaseMatch extends Model {

	protected $table = 'case_match_details';
        
    public $timestamps = false;

    protected $fillable = ['case_detail_id', 'image_url', 'data','similarity','photo_id'];

}
