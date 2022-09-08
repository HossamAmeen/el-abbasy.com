<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Step;
use App\Models\SubStep;
use App\Models\Service;
use App\Models\Apartment;
use App\Models\Batch;
use App\Models\Contract;
use App\Enums\ApartmentStatus;
use App\Enums\BatchStatus;

class UserController extends Controller
{
    function show($id){

        if (Auth::user() == null){
            return redirect('/home')->withErrors(['invalid' => 'Session expired please login again']);
        }elseif(Auth::user()->id != $id){
            return redirect('/home')->withErrors(['invalid' => 'Invalid profile']);
        }
        else{
            $user = User::find($id);
            $apartment = $user ? $user->apartments->where('status', ApartmentStatus::active)->first():null;
            $steps = $apartment ? $apartment->steps():null;
            $contract = $apartment ? $apartment->contract:null;
            $batches = $contract ? $contract->batches:null;
            $remaining_price = $batches ? $batches->where('status', BatchStatus::unpaid)->sum('value'):null;
            $page = Page::where('model_name', 'User')->get()->first();
            $page = $page->load('translations');

            return view('profile', ['user' => $user, 'apartment' => $apartment, 'contract' => $contract,
                    'remaining_price' => $remaining_price, 'batches' => $batches, 'steps' => $steps, 'page' => $page]);
        }
    }
}
