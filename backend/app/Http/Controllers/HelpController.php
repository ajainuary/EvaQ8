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
                $errors = $validator->errors();
                return view('registration_errors', compact('errors'));
    	       }
        $newhelp = new Help;
        $newhelp->name = $data['fname'].$data['lname'];
        $newhelp->phone_number = $data['phone_number'];
        $newhelp->latitude = $data['latitude'];
        $newhelp->longitude = $data['longitude'];
        $newhelp->status = "1";
        try{
        $newhelp->save();
        return view('registered', compact('newhelp'));
        }
        catch(Exception $e){
            $errors = "Some Error Occurred";
            return view('registration_errors', compact('errors'));
        }
    }
    public function display_all_people(Request $request)
    {
        $people = Help::all();
         return view('show', compact('people'));
    }   


}
