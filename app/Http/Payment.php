<?php
namespace App\Http;

use App\Models\Transaction;
use App\Http\PayMob;

class Payment
{
    public function __construct($order, $amount, $payment_method){
        $this->order = $order;
        $this->amount = $amount;
        $this->payment_method = $payment_method;
        $this->payment_reference = $this->generate_payment_reference();
    }
    public function createVisaPayment()
    {
        $api = new PayMob($this->amount, $this->payment_reference, $this->order, env('CARD_INTEGRATION_ID'));
        $api = $api->initiate_order();
        $accept_order_id = $api->order_id;
        $payment_key = $api->payment_key;
        $this->create_payment_transaction($accept_order_id);
        return redirect("https://accept.paymobsolutions.com/api/acceptance/iframes/" . env('IFRAME_ID') . "?payment_token={$payment_key}");
    }

    public function createWalletPayment($mobile_number)
    {
        $api = new PayMob($this->amount, $this->payment_reference, $this->order, env('MOBILE_INTEGRATION_ID'));
        $api = $api->initiate_order();
        $api = $api->mobile_wallet($mobile_number);
        $redirect_url = $api->redirect_url;
        $accept_order_id = $api->order_id;
        $this->create_payment_transaction($accept_order_id);
        return redirect($redirect_url);
    }

    public function createInstallmentPayment()
    {
        $api = new PayMob($this->amount, $this->payment_reference, $this->order, env('INSTALLMENT_INTEGRATION_ID'));
        $api = $api->initiate_order();
        $accept_order_id = $api->order_id;
        $payment_key = $api->payment_key;
        $this->create_payment_transaction($accept_order_id);
        return redirect("https://accept.paymobsolutions.com/api/acceptance/iframes/" . env('INSTALLMENT_IFRAME_ID') . "?payment_token={$payment_key}");
    }


    public function create_payment_transaction($gateway_id){
        $transaction = new Transaction();
        $transaction->payment_method = $this->payment_method;
        $transaction->amount = $this->amount;
        $transaction->mediator_id = $this->order->id;
        $transaction->mediator_type = get_class($this->order);
        $transaction->gateway_id = $gateway_id;
        $transaction->payment_reference = $this->payment_reference;
        $transaction->save();
    }

    public function generate_payment_reference()
    {
        $payment_reference = null;
        while (true)
        {
            $payment_reference = rand(0, 10**7);
            $transaction = Transaction::where('payment_reference', '=', $payment_reference)->first();
            if ($transaction == null) break;
        }
        return $payment_reference;
    }
}
