<?php

namespace App\Http\Controllers;
use Validator;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Help;

class HelpController extends Controller
{

    public function create(Request $request)
    {
        $data = $request->all();
        $data = $request->all();
      	$messages = [
    	    'required' => 'The :attribute field is required.',

    	];
    	$validator = Validator::make($data, [
                   'fname' => 'required',
    	           'lname' => 'required',
    	           'phone_number' => 'required',
    	       ]);

    	       if ($validator->fails()) {
    	         return response()->json([
    	      "status" => "FAILURE",
    	      "code"  =>   "200",
    	      "message" => "Validation Error",
    	      "errors" => $validator->errors()]);
    	       }
        $help = new Help;
        $help->name = $data['fname'].$data['lname'];
        $help->phone_number = $data['phone_number'];
        $help->latitude = $data['latitude'];
        $help->longitude = $data['longitude'];
        $help->status = "1";
        $help->save();
        return response()->json([
            "status" => "SUCCESS",
            "code"  =>   "200", 
            "message" => "Help added successfully",
            "data"   =>  $help ]); 
    }

}
