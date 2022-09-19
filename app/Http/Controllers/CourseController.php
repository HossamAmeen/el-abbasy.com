<?php

namespace App\Http\Controllers;
use App\Models\{Course,CourseReservation,Specialty};
use App\Http\Payment;
use App\Enums\PaymentMethod;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    function index($course_id = null){
        if($course_id){
            $course = Course::where('id', $course_id)->where('is_active', true)->first();
            $courses = Course::where('course_type', 'course')->where("id", "!=",$course_id)->limit(3)->get();
            return view('course_detail', compact('course', 'courses'));
        }
        $specialties = Specialty::get();
        $courses = Course::where('course_type', 'course')->where('is_active', true);
        $trainings = Course::where('course_type', 'training')->where('is_active', true);
        if(request('name')){
            // return ":"
            $courses = $courses->where('course_name','like', '%'. request('name') .'%' );
            $trainings = $trainings->where('course_name','like', '%'. request('name') .'%' );
        }
        if(request('specialty_id')){
            $courses = $courses->where('specialty_id','like', '%'. request('specialty_id') .'%' );
            $trainings = $trainings->where('specialty_id','like', '%'. request('specialty_id') .'%' );
        }
        $courses = $courses->get();    
        $trainings = $trainings->get();
        return view('courses', compact("courses",'trainings','specialties'),['specialty_id'=>request('specialty_id')]);
    }

    public function reservation(Request $request, $course_id=0)
    {
        $success = 0;
        $specialties = Specialty::get();
        if (request()->isMethod('post')) {
            $course_reservation = CourseReservation::create($request->all());
            $course = Course::findOrFail(request('course_id'));
            $success = 1;
            if($course_reservation->save())
            {
                if (request('payment_time') == 'later') {
                    return view("course_reservation_message", compact('success'));
                }
                else {
                    $payment_method_key = PaymentMethod::fromValue((int)request('payment_method'))->key;
                   
                    if( request('payment_option') == "1")
                        $price = $course->course_cost_after ;
                    else{
                        $price = $course->course_reservation_cost ;
                    }
                    
                    
                    if ($payment_method_key == 'visa') {
                        $payment = new Payment($course_reservation, $price, (int)request('payment_method'));
                        return $payment->createVisaPayment();
                    }elseif($payment_method_key == 'wallet'){
                        $payment = new Payment($course_reservation, $price, (int)request('payment_method'));
                        $wallet_phone_number = (int)\request('wallet_phone_number');
                        $wallet_phone_number = $this->ArabicNumbersToEnglish($wallet_phone_number);
                        return $payment->createWalletPayment($wallet_phone_number);
                    }elseif($payment_method_key == 'installment'){
                        $payment = new Payment($course_reservation, $price, (int)request('payment_method'));
                        return $payment->createInstallmentPayment();
                    }
                    
                    
                    
                
                
                }
               
            }
            
        }
        $courses = Course::get();
        return view("course_reservation", compact('courses', 'success', 'course_id','specialties'));
    
    }

    function ArabicNumbersToEnglish($string) {
        return strtr($string, array('۰' => '0', '۱' => '1', '۲' => '2', '۳' => '3', '۴' => '4', '۵' => '5', '۶' => '6', '۷' => '7', '۸' => '8', '۹' => '9', '٠' => '0', '١' => '1', '٢' => '2', '٣' => '3', '٤' => '4', '٥' => '5', '٦' => '6', '٧' => '7', '٨' => '8', '٩' => '9'));
    }
}
