<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Enums\ApartmentStatus;

class ApartmentsController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{
  function store(Request $request){
    $validator = Validator::make(request()->all(), [
        'type' => 'required',
        'address' => 'required',
        'status' => 'required',
        'user_id' => 'required',
      ]);

    $apartment = new Apartment();
    $apartment->type = \request('type');
    $apartment->address = \request('address');
    $apartment->status = \request('status');
    $apartment->user_id = \request('user_id');

    $active_apartment = Apartment::where([
            ['user_id', $apartment->user_id], ['status', ApartmentStatus::active]
        ])->get()->first();
    if($active_apartment != null && $apartment->status == ApartmentStatus::active){
        $validator->errors()->add('user_id', 'This user has active apartment already');
    }

    if (!$validator->errors()->isEmpty()) {
        return redirect()->route("voyager.apartments.create")
                      ->withErrors($validator)
                      ->withInput();
     }else{
         $apartment->save();
         $apartment->sub_steps()->attach(\request("apartment_belongstomany_sub_step_relationship"));
         $redirect = redirect()->route("voyager.apartments.index");
         return $redirect;
     }
  }

  public function toggle(){
    $apartment = Apartment::where('id', \request("id"))->first();
    $validator = Validator::make(request()->all(), []);
    if($apartment->status == ApartmentStatus::active){
        $apartment->status = ApartmentStatus::inactive;
    }else{
        $apartment->status = ApartmentStatus::active;
        $active_apartment = Apartment::where([
            ['user_id', $apartment->user_id], ['status', ApartmentStatus::active]
        ])->get()->first();

        if($active_apartment != null){
            $validator->errors()->add('user_id', "{$apartment->user->name} has active apartment already");
        }
    }

    if (!$validator->errors()->isEmpty()) {
        return redirect()->route("voyager.apartments.index")
                      ->withErrors($validator)
                      ->withInput();
    }else{
        $apartment->save();
        $redirect = redirect()->route("voyager.apartments.index");
        return $redirect;
    }
  }
}
