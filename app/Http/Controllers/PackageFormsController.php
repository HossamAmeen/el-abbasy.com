<?php

namespace App\Http\Controllers;

use App\Models\Governorate;
use App\Models\PackageForm;
use App\Models\Package;
use App\Mail\PackageFormMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\City;
use App\Http\PayMob;
use App\Http\Payment;
use App\Enums\PaymentMethod;
use App\Models\Page;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

use DB;
use Lang;

class PackageFormsController extends Controller
{
    function index()
    {
        $page = Page::where('model_name', 'package_form')->get()->first();
        $video ="";
        $explode_video = json_decode($page->video, true);
        if(!empty($explode_video)&& $page->video != null) {
            $video = $explode_video[0]['download_link'];
        }
        $page = $page->load('translations');
        $Governorates = Governorate::all();
        $packages = Package::where('end_date', '>=', Carbon::today())->get();

        return view('package_form', ['Governorates' => $Governorates, 'packages' => $packages, 'page' => $page,'video'=>$video]);
    }

    function updatepricePackage($id)
    {
        $package = Package::where('id', $id)->get();
        $price = $package[0]->price;
        $oldprice = $package[0]->old_price;
        return response()->json([
            'Price' => $price,
            'OldPrice' => $oldprice,
            'Status' => 1

        ]);
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
            'payment_method.required_if' => Lang::get('payment'),
            'package_id.required' => Lang::get('package_id')

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
            'payment_time' => 'required',
            'package_id' => 'required',
            'payment_method' => 'required_if:payment_time,now'
        ];
        $this->validate(\request(), $roles, $messages);
        $package_form = new PackageForm();

        $package_form->name = \request('name');
        $package_form->email = \request('email');
        $package_form->number = $number;
        $package_form->address = \request('address');
        $package_form->job = \request('job');
        $package_form->package_id = \request('package_id');
        $governorate_id = \request('governorate');
        $governorate = Governorate::where('id', $governorate_id)->get();
        $package_form->governorate = $governorate[0]->name;

        $city_id = \request('city');
        $city = City::where('id', $city_id)->get();
        $package_form->city = $city[0]->name;

        $package_form->apartment_type = \request('apartment_type');
        $package_form->apartment_area = \request('apartment_area');
        $package_form->apartment_status = \request('apartment_status');

        $start_stat = \request('start_stat');
        $available_start = \request('available_start');
        $package_form->available_start_time = $available_start . ' ' . $start_stat;

        $end_stat = \request('end_stat');
        $available_end = \request('available_end');
        $package_form->available_end_time = $available_end . ' ' . $end_stat;

        $package_form->notes = \request('notes');
        $package_form->price = \request('price');

        $payment_method = (int)\request('payment_method');
        $payment_time = \request('payment_time');

        $mobile_number = (int)\request('wallet_phone');
        $mobile_number = $this->ArabicNumbersToEnglish($mobile_number);

        $payment_method_key = PaymentMethod::fromValue($payment_method)->key;

        if ($package_form->save()) {
            Mail::to(env('MAIL_TO'))->send(new PackageFormMailer(env('MAIL_TO'), $package_form->name, $package_form->number));

            if ($payment_time == 'later') {
                return redirect('/CallBack_Preview?success=true')->with('message' , __("free_mode_message"));
            }
            else {
                if ($payment_method_key == 'visa') {
                    $payment = new Payment($package_form, $package_form->price, $payment_method);
                    return $payment->createVisaPayment();
                }elseif($payment_method_key == 'wallet'){
                    $payment = new Payment($package_form, $package_form->price, $payment_method);
                    return $payment->createWalletPayment($mobile_number);
                }elseif($payment_method_key == 'installment'){
                    $payment = new Payment($package_form, $package_form->price, $payment_method);
                    return $payment->createInstallmentPayment();
                }
                else{
                    $success = 1;
                    return redirect('/CallBack_Preview?success=true')->with('message' , __("free_mode_message"));
                }
            }
        } else {
            $page = Page::where('model_name', 'package_form')->get()->first();
            $video ="";
            $explode_video = json_decode($page->video, true);
            if(!empty($explode_video)&& $page->video != null) {
                $video = $explode_video[0]['download_link'];
            }
            $page = $page->load('translations');
            $Governorates = Governorate::all();
            $packages = Package::where('end_date', '>=', Carbon::today())->get();

            return view('package_form', ['Governorates' => $Governorates, 'packages' => $packages, 'page' => $page,'video'=>$video]);
        }

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
}
