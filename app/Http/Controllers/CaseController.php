<?php namespace App\Http\Controllers;

use App\Case;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CaseController extends Controller {

	public function addCase(Request $request)
	{
		$input = $request->only('name', 'email');

		$input['case_number'] = uniqid('CASE');

		$validator = Validator::make(
		    $input,
		    [
		    	'name' => 'required',
		    	'email' => 'required'
		    ]
		);	
		if ($validator->fails())
		{
		    return redirect()->back()->withErrors($validator->errors());
		}

		$case = Case::create($input);

		return $case;

	}

	public function getCase()
	{
		dd(__METHOD__);
	}
}
