<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\TransactionStatus;
use App\Models\Transaction;
use App\Http\HmacCalculator;
use Illuminate\Support\Facades\Log;

class PayMobController extends Controller
{
    public function processedCallback(Request $request)
    {
        $parameters = $this->prepare_callback_params($request);

        $hmac_class_object = new HmacCalculator();
        $hmac = $hmac_class_object->calculate($parameters);
        $hmacParam = $request->input('hmac');

        $orderId = $parameters['order']['id'];
        $transaction = Transaction::whereGatewayId($orderId)->first();
        if ($transaction == null){
            return response()
                ->json(['success' => false], 404);
        }
        if ($transaction != null && $transaction->status == TransactionStatus::reflected)
        {
            return response()
                ->json(['success' => true], 200);
        }
        if ($parameters['success'] && $hmac == $hmacParam)
        { // transcation succeeded.
            $transaction->status = TransactionStatus::completed;
            $transaction->save();
            return response()
                ->json(['success' => true], 200);
        }
        else
        { // transaction failed.
            $transaction->status = TransactionStatus::failed;
            $transaction->save();
            return response()
                ->json(['success' => false], 200);
        }
    }
    public function processedResponse(Request $request)
    {
        $parameters = $this->prepare_response_params($request);

        $hmac_class_object = new HmacCalculator();
        $hmac = $hmac_class_object->calculate($parameters);
        $hmacParam = $request->input('hmac');

        $orderId = $parameters['order'];
        $transaction = Transaction::whereGatewayId($orderId)->first();
        if ($transaction == null)
        {
            return response()->json(['success' => false], 404);
        }

        if ($parameters['success'] == 'true' && $hmac == $hmacParam)
        { // transcation succeeded.
            $transaction->status = TransactionStatus::reflected;
            $transaction->save();
            $success = 1;
            
            
            return redirect('/reservation_bill/'.$transaction->mediator_id.'/bill')->with('message' , __("success_payment"));
            // return redirect('/CallBack_Preview?success=true')->with('message' , __("success_payment"));
        }
        else
        { // transaction failed.
            $transaction->status = TransactionStatus::failed;
            $transaction->save();
            $success = 0;
           return redirect('/CallBack_Preview?success=false')->with('message' , __("failed_payment"));
          // return redirect('/CallBack_Preview?success=false')->with('message' , __("failed_payment"));

        }
    }

    public function prepare_response_params($request){
        $parameters = $request->only("amount_cents", "created_at", "currency",
        "error_occured", "has_parent_transaction", "id",
        "integration_id", "is_3d_secure", "is_auth",
        "is_capture", "is_refunded", "is_standalone_payment",
        "is_voided", "owner", "pending", "success", "order",
        "source_data_pan", "source_data_sub_type", "source_data_type");
        return $parameters;
    }

    public function prepare_callback_params($request){
        $parameters = $request->collect("obj")
            ->only("amount_cents", "created_at", "currency",
                "error_occured", "has_parent_transaction",
                "id", "integration_id", "is_3d_secure",
                "is_auth", "is_capture", "is_refunded",
                "is_standalone_payment", "is_voided",
                "owner", "pending", "success");
        $parameters = $parameters->merge(["order" => $request->collect('obj.order')
            ->only('id') ]);
        $parameters = $parameters->merge(["source_data" => $request->collect('obj.source_data')
            ->only('pan', 'sub_type', 'type') ]);
        return $parameters;
    }
}

