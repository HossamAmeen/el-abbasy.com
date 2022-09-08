<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use App\Models\Step;
use Illuminate\Http\Request;

class StepsController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{
    function store(Request $request){
       $validator = Validator::make(request()->all(), [
           'name' => 'required',
           'status' => 'required',
           'apartment_id' => 'required',
         ]);
       $step = new Step();
       $step->name = \request('name');
       $step->status = \request('status');
       $step->apartment_id = \request('apartment_id');

       if (!$validator->errors()->isEmpty()) {
        return redirect()->route("voyager.steps.create")
                      ->withErrors($validator)
                      ->withInput();
      }else{
          $step->save();
          $redirect = redirect()->route("voyager.steps.index");
          return $redirect;
      }
    }
}
