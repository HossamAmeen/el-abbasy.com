<?php

namespace App\Http\Controllers;

use App\Models\Governorate;
use App\Models\PreviewOrder;
use App\Mail\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\City;
use App\Http\PayMob;
use App\Http\Payment;
use App\Enums\PaymentMethod;
use App\Models\Page;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use DB;
use PDF;
use Lang;

class PreviewController extends Controller
{

    function index()
    {

        $page = Page::where('model_name', 'preview_order')->get()->first();
        $page = $page->load('translations');
        $Governorates = Governorate::all();
        $video ="";
        $explode_video = json_decode($page->video, true);
        if(!empty($explode_video)&& $page->video != null) {
            $video = $explode_video[0]['download_link'];
        }

      return view('preview', ['Governorates' => $Governorates, 'page' => $page , 'video'=> $video]);

    }

    function callback()
    {
        return view('callback_preview');
    }

    function updatecity($id)
    {

        $Json = array();
        $locale = App::currentLocale();
        $options = "";
      //  $var = $locale;
        $var = __('Choose the center');
        $x = 0;
        $governorate = Governorate::where('id', $id)->get();
        $cities = $governorate[0]->city;

        foreach ($cities as $city) {
            if ($x == 0) {
                $options .= "
             <option value=''>{$var}</option>
             <option value='{$city->id}'>{$city->translate($locale)->name}</option>
            ";
                $x++;
            } else {
                $options .= "
             <option value='{$city->id}'>{$city->translate($locale)->name}</option>
            ";
            }

        }
        return response()->json([
            'Options' => $options,
            'Status' => 1

        ]);
    }

    function updateprice($id)
    {
        $city = City::where('id', $id)->get();
        $price = $city[0]->price;

        return response()->json([
            'Price' => $price,
            'Status' => 1

        ]);
    }
    function ArabicNumbersToEnglish($string) {
        return strtr($string, array('۰' => '0', '۱' => '1', '۲' => '2', '۳' => '3', '۴' => '4', '۵' => '5', '۶' => '6', '۷' => '7', '۸' => '8', '۹' => '9', '٠' => '0', '١' => '1', '٢' => '2', '٣' => '3', '٤' => '4', '٥' => '5', '٦' => '6', '٧' => '7', '٨' => '8', '٩' => '9'));
         }

    public function submit()
    {
        $number = \request('number');
        $number = $this->ArabicNumbersToEnglish($number);
        $messages = [
            'name.required' => Lang::get('A name is required'),
            'email.required' => Lang::get('An email is required'),
            // 'notes.required' => Lang::get('An Notes is required'),
            'number.size' => Lang::get('An number should be 11 digits'),
            'number.required' => Lang::get('An number is required'),
            'address.required' => Lang::get('An Address is required'),
            'job.required' => Lang::get('An job is required'),
            'governorate.required' => Lang::get('An governorate is required'),
            'city.required' => Lang::get('An city is required'),
            'apartment_type.required' => Lang::get('An apartment type is required'),
            'apartment_area.required' => Lang::get('An apartment area is required'),
            'apartment_status.required' => Lang::get('An apartment status is required'),
            'available_start.required' => Lang::get('An time is required'),
            'available_end.required' => Lang::get('An time is required'),
            'payment.required' => Lang::get('payment')

        ];

        $roles = [
            'name' => 'required',
            'email' => 'required',
            'number' => 'required|size:11',
            'address' => 'required',
            'job' => 'required',
            'governorate' => 'required',
            'city' => 'required',
            'apartment_type' => 'required',
            'apartment_area' => 'required',
            'apartment_status' => 'required',
            'available_start' => 'required',
            'available_end' => 'required',
            // 'notes' => 'required',
            'payment' => 'required'
        ];
        $this->validate(\request(), $roles, $messages);
        $preview_order = new PreviewOrder();
        $preview_order->name = \request('name');
        $preview_order->email = \request('email');
        $preview_order->number = $number;
        $preview_order->address = \request('address');
        $preview_order->job = \request('job');
        $governorate_id = \request('governorate');
        $governorate = Governorate::where('id', $governorate_id)->get();
        $preview_order->governorate = $governorate[0]->name;

        $city_id = \request('city');
        $city = City::where('id', $city_id)->get();
        $preview_order->city = $city[0]->name;

        $preview_order->apartment_type = \request('apartment_type');
        $preview_order->apartment_area = \request('apartment_area');
        $preview_order->apartment_status = \request('apartment_status');

        $start_stat = \request('start_stat');
        $available_start = \request('available_start');
        $preview_order->available_start_time = $available_start . ' ' . $start_stat;

        $end_stat = \request('end_stat');
        $available_end = \request('available_end');
        $preview_order->available_end_time = $available_end . ' ' . $end_stat;

        $preview_order->notes = \request('notes');
        $preview_order->price = \request('price');

        $payment_method = (int)\request('payment');

        $mobile_number = (int)\request('wallet_phone');
        $mobile_number = $this->ArabicNumbersToEnglish($mobile_number);

        $payment_method_key = PaymentMethod::fromValue($payment_method)->key;

        if ($preview_order->save()) {
            if ($payment_method_key == 'visa') {
                $payment = new Payment($preview_order, $preview_order->price, $payment_method);
                return $payment->createVisaPayment();
            }elseif($payment_method_key == 'wallet'){
                $payment = new Payment($preview_order, $preview_order->price, $payment_method);
                return $payment->createWalletPayment($mobile_number);
            }elseif($payment_method_key == 'installment'){
                $payment = new Payment($preview_order, $preview_order->price, $payment_method);
                return $payment->createInstallmentPayment();
            }
            else{
                $success = 1;

                $page = Page::where('model_name', 'preview_order')->get()->first();
                $page = $page->load('translations');
                Mail::to(env('MAIL_TO'))->send(new Order(env('MAIL_TO'), $preview_order->name, $preview_order->number));

                return redirect('/CallBack_Preview?success=true')->with('message' , __("free_mode_message"));
            }
        } else {
            $page = Page::where('model_name', 'preview_order')->get()->first();
            $Governorates = Governorate::all();
            $video ="";
            $explode_video = json_decode($page->video, true);
            if(!empty($explode_video)&& $page->video != null) {
                $video = $explode_video[0]['download_link'];
            }
            $page = $page->load('translations');
            return redirect('preview', ['Governorates' => $Governorates, 'page' => $page ,'video' =>$video]);
        }

    }

    public function download_pdf(){
        $start_date = \request('start_date');
        $end_date = \request('end_date');
        $preview_orders = PreviewOrder::with('transaction')->get();
        if($start_date != null){
            $preview_orders = $preview_orders->where('created_at', '>=', $start_date);
        }
        if($end_date != null){
            $preview_orders = $preview_orders->where('created_at', '<=', $end_date);
        }
        view()->share('data', $preview_orders);
        $pdf = PDF::loadView('pdf.preview', [$preview_orders]);
        return $pdf->stream('preview.pdf');
    }

    public function download_pdf_id($id){
        $preview_orders = PreviewOrder::where('id', $id)->get();
        view()->share('data', $preview_orders);
        $pdf = PDF::loadView('pdf.preview_one', [$preview_orders]);
        return $pdf->stream('preview_one.pdf');

    }
}
