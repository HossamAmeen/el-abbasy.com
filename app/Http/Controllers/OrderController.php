<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Page;
use App\Models\User;
use App\Models\Transaction;
use Lang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\PayMob;
use App\Http\Payment;
use App\Mail\OrderMailer;
use Illuminate\Support\Facades\Mail;
use App\Enums\OrderType;

class OrderController extends Controller
{
    function index(){
      $page = Page::where('model_name', 'Order')->get()->first();
        $video ="";
        $explode_video = json_decode($page->video, true);
        if(!empty($explode_video)&& $page->video != null) {
            $video = $explode_video[0]['download_link'];
        }
        $page = $page->load('translations');
      return view('apply_order', ['page' => $page, 'video'=>$video]);
    }

    function store(){
      $roles = [
        'name' => 'required',
        'email' => 'required',
        'type' => 'required',
        'notes' => 'required',
        'phone_number' => 'required|regex:/(01)[0-9]{9}/'
      ];
      $messages = [
          'name.required' => Lang::get('A name is required'),
          'email.required' => Lang::get('An email is required'),
          'notes.required' => Lang::get('A note is required'),
          'phone_number.regex' => Lang::get('An number should be 11 digits'),
         'phone_number.required' => Lang::get('An number is required'),
      ];

       $order = new Order();
       $order->name = \request('name');
       $order->email = \request('email');
       $order->type = (int)\request('type');
       $order->notes = \request('notes');
       $order->phone_number = \request('phone_number');
       $this->validate(\request(), $roles, $messages);
       $type = OrderType::fromValue($order->type)->key;

       if ($order->save())
       {
           $success = 1;
           $page = Page::where('model_name', 'Order')->get()->first();
           $video ="";
           $explode_video = json_decode($page->video, true);
           if(!empty($explode_video)&& $page->video != null) {
               $video = $explode_video[0]['download_link'];
           }
           $page = $page->load('translations');
           Mail::to(env('MAIL_TO'))->send(new OrderMailer(env('MAIL_TO'), $order->name, $order->phone_number, Lang::get($type,[],'ar')));
           return view('/apply_order', ['success' => $success, 'page' => $page, 'video'=>$video]);
       }
       else
       {
           return redirect('/apply_order');
       }
    }
}
