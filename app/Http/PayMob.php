<?php
namespace App\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class PayMob
{
    public $auth_token, $merchant_id, $amount, $order_id, $payment_key,
    $user, $payment_reference, $redirection_url;

    public function __construct($amount, $payment_reference, $order, $integration_id)
    {
        $this->amount = $amount;
        $this->payment_reference = $payment_reference;
        $this->order = $order;
        $this->integration_id = $integration_id;
    }

    public function initiate_order()
    {
        $this->authenticate();
        $this->create_order();
        $this->request_payment_key();
        return $this;
    }

    public function authenticate(){
      $client = new Client([
          'base_uri' => 'https://accept.paymobsolutions.com/api',
          'headers' => [ 'Content-Type' => 'application/json' ]
          ]);
      $response = $client->request('POST', '/api/auth/tokens',
        ['body' => json_encode(['api_key'=> env('API_KEY', '')])]);
      $body = $response->getBody();
      $content = $body->getContents();
      $json_response = json_decode($content, true);

      $this->auth_token = $json_response['token'];
      $this->merchant_id = $json_response['profile']['id'];
    }

    public function create_order(){
      $client = new Client([
         'base_uri' => 'https://accept.paymobsolutions.com/api',
         'headers' => [ 'Content-Type' => 'application/json' ]
        ]);
      $response = $client->request('POST', '/api/ecommerce/orders',
      ['body' => json_encode(
        ['auth_token' => $this->auth_token,
         'merchant_id' => $this->merchant_id,
         'delivery_needed' => false,
         'currency' => 'EGP',
         'amount_cents' => $this->amount * 100,
         'merchant_order_id' => $this->payment_reference])]);
      $body = $response->getBody();
      $content = $body->getContents();
      $json_response = json_decode($content, true);
      $this->order_id = $json_response['id'];
    }

    public function request_payment_key(){
      $client = new Client([
            'base_uri' => 'https://accept.paymobsolutions.com/api',
            'headers' => [ 'Content-Type' => 'application/json' ]
           ]);
      $response = $client->request('POST','api/acceptance/payment_keys',
        ['body' => json_encode( ['auth_token' => $this->auth_token,
          'amount_cents' => $this->amount * 100,
          'order_id' => $this->order_id,
          'currency' => 'EGP',
          'integration_id' => $this->integration_id,
          'billing_data' => [
          'email' => $this->order->email,
          'first_name' => $this->order->name,
          'last_name' => $this->order->name,
          'building' => 'NA',
          'apartment' => 'NA',
          'street' => 'NA',
          'floor' => 'NA',
          'city' => 'NA',
          'phone_number' => $this->order->number,
          'country' => 'NA',
          ],
         ]
      )]);
      $body = $response->getBody();
      $content = $body->getContents();
      $json_response = json_decode($content, true);
      $this->payment_key = $json_response['token'];
    }

    public function mobile_wallet($mobile_number){
        $client = new Client([
            'base_uri' => 'https://accept.paymob.com/api',
            'headers' => [ 'Content-Type' => 'application/json' ]
            ]);

        $response = $client->request('POST', '/api/acceptance/payments/pay',
          ['body' => json_encode([
              'source'=> [
                  "identifier" => $mobile_number,
                  "subtype" => "WALLET"],
               'payment_token' => $this->payment_key
              ])]);
        $body = $response->getBody();
        $content = $body->getContents();
        $json_response = json_decode($content, true);
        $this->redirect_url = $json_response["redirect_url"];
        return $this;
    }
}
