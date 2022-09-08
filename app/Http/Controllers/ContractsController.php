<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\Contract;
use App\Models\Batch;
use App\Models\Apartment;
use App\Enums\BatchStatus;
use DB;
use Carbon\Carbon;
use App\Enums\ContractType;
use App\Enums\ContractCategory;
use App\Enums\ContractStatus;

class ContractsController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{
    function store(Request $request){
       $validator = Validator::make(request()->all(), [
         'start_date' => 'required',
         'end_date' => 'required',
         'date' => 'required',
         'total_price' => 'required',
         'apartment_id' => 'required',
         'contract_type' => 'required',
         'remaining_price' => 'required',
         'images' => 'required',
          //'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
       ]);
        $messages = [
            'images.required' => 'An image is required',
        ];

       $contract = new Contract();
       $contract->start_date = \request('start_date');
       $contract->end_date = \request('end_date');
       $contract->status = \request('status');
       $contract->date = \request('date');
       $contract->total_price = (float)\request('total_price');
       $contract->remaining_price = (float)\request('remaining_price');
       $contract->total_price_with_interest = (float)\request('total_price_with_interest');
       $contract->number_of_batches = (float)\request('number_of_batches');
       $contract->user_id = \request('user_id');
       $contract->apartment_id = \request('apartment_id');
       $contract->contract_type = \request('contract_type');
       $contract->contract_category = \request('contract_category');
       $contract->deposit = (float)\request('deposit');
       $contract->note = \request('note');
        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/storage/contracts/'.date('FY'), $name);
                $data[] ='contracts/'.date('FY').'/'.$name;
            }
        }
//        var_dump($data);
//        die();
        $contract->images=json_encode($data);

       $total_price = $contract->total_price;
       $number_of_batches = $contract->number_of_batches;
       $cash_batch_values = array_filter(\request('cash_batch_values'));
       $installment_batch_value = 0;
       $batch_value_array = [];
       $deposit = $contract->deposit;
       $remaining_price = $contract->remaining_price;
       $total_price_with_interest = $contract->total_price_with_interest;

       if ((int)$contract->contract_type == ContractType::installments){
          $installment_batch_value = ($total_price_with_interest / $number_of_batches);
          if( ($deposit + $remaining_price) != $total_price){
            $validator->errors()->add('Total price',
            'Total price must be equal remaining price + deposit');
          }
       }else{
           $contract->batch_value = implode(", ", $cash_batch_values);
           if(array_sum($cash_batch_values) != $remaining_price){
            $validator->errors()->add('remaining price',
            'Total price must be equal sum of all batches');
           }
       }

       $user_apartment = Apartment::where('user_id', $contract->user_id)->where('id', $contract->apartment_id)->get()->first();

       if($user_apartment == null){
         $validator->errors()->add('user_id', 'This apartment dose not belong to this user');
       }

       $has_apartment = Contract::where('apartment_id', $contract->apartment_id)->where('status', ContractStatus::active)->get()->first();

       if($has_apartment != null){
        $validator->errors()->add('apartment_id', 'This apartment has active contract already');
       }

       if ( Carbon::parse($contract->start_date)->gt(Carbon::parse($contract->end_date) )){
          $validator->errors()->add('start_date', 'Start date must be before end date');
       }
       if ( Carbon::parse($contract->date)->gt(Carbon::parse($contract->start_date) )){
          $validator->errors()->add('date', 'Date must be before or equal start date');
       }

       if ( Carbon::parse($contract->start_date)->eq(Carbon::parse($contract->end_date) )){
          $validator->errors()->add('start_date', 'start date must not be equal end date');
       }

       if( $contract->note == null && $contract->status == ContractStatus::expired ){
          $validator->errors()->add('note', 'note must be exists');
       }

       if (!$validator->errors()->isEmpty()) {
          return redirect()->route("voyager.contracts.create")
                        ->withErrors($validator)
                        ->withInput();
       }else{

           $contract->save();
           $inserted_batches = array();
           $number = (int)$contract->number_of_batches;
           if((int)$contract->contract_type == ContractType::installments){
             for($i = 0; $i < $number; $i++){
                array_push($inserted_batches, ["value" => $installment_batch_value,
                                                "status"=> BatchStatus::unpaid,
                                                "contract_id" => $contract->id,
                                                "created_at" => Carbon::now(),
                                                "updated_at" => Carbon::now()]);
               }
           }else{
            for($i = 0; $i < count($cash_batch_values); $i++){
                array_push($inserted_batches, ["value" => $cash_batch_values[$i],
                                                "status"=> BatchStatus::unpaid,
                                                "contract_id" => $contract->id,
                                                "created_at" => Carbon::now(),
                                                "updated_at" => Carbon::now()]);
               }
           }
           DB::table('batches')->insert($inserted_batches);

           $redirect = redirect()->route("voyager.contracts.index");
           return $redirect;
       }
    }
}
