<?php

namespace App\Http\Controllers;
use App\Models\{Course,CourseReservation,Specialty,Invoice};
use App\Http\Payment;
use App\Enums\PaymentMethod;
use Illuminate\Http\Request;
use App\Models\Page;

class CourseController extends Controller
{
    function index($course_id = null){
        if($course_id){
            $course = Course::where('id', $course_id)->where('is_active', true)->first();
            $courses = Course::where('course_type', $course->course_type)
                               ->where('specialty_id', $course->specialty_id)->where('is_active', true)
                               ->where("id", "!=",$course_id)->limit(3)->get();
            return view('course_detail', compact('course', 'courses'));
        }
        $specialties = Specialty::get();
        $courses = Course::where('course_type', 'course')->where('is_active', true);
        $trainings = Course::where('course_type', 'training')->where('is_active', true);
        if(request('name')){
            // return ":"
            
            $courses = $courses->whereTranslation('course_name','like', '%'. request('name') .'%' );
            $trainings = $trainings->whereTranslation('course_name','like', '%'. request('name') .'%' );
        }
        if(request('specialty_id')){
            $courses = $courses->where('specialty_id','like', '%'. request('specialty_id') .'%' );
            $trainings = $trainings->where('specialty_id','like', '%'. request('specialty_id') .'%' );
        }
        $courses = $courses->get();    
        $trainings = $trainings->get();
        
        $page = Page::where('model_name', 'Courses')->get()->first();
        
        $video ="";
        $explode_video = json_decode($page->video, true);
        if(!empty($explode_video)&& $page->video != null) {
            $video = $explode_video[0]['download_link'];
        }
        
        
         $page = $page->load('translations');
        return view('courses', compact("courses",'trainings','specialties','page','video'),['specialty_id'=>request('specialty_id')]);
    }

    public function reservation(Request $request, $course_id=0)
    {
        $page = Page::where('model_name', 'CourseReservation')->get()->first();
        
        $video ="";
        $explode_video = json_decode($page->video, true);
        if(!empty($explode_video)&& $page->video != null) {
            $video = $explode_video[0]['download_link'];
        }
        
        
         $page = $page->load('translations');
         
        $success = 0;
        $specialties = Specialty::get();
        $course = Course::findOrFail(request('course_id'));
        if (request()->isMethod('post')) {
            $course_reservation = CourseReservation::create($request->all());
            
            $success = 1;
            if($course_reservation->save())
            {
                if (request('payment_time') == 'later') { 
                    return view("course_reservation_message", compact('success', 'course_reservation'));
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
        return view("course_reservation", compact('courses', 'success','course', 'course_id','specialties','page','video'));
    
    }

    public function reservation_bill($course_reservation_id)
    {
        $page = Page::where('model_name', 'ReservationBill')->get()->first();
        
        $video ="";
        $explode_video = json_decode($page->video, true);
        if(!empty($explode_video)&& $page->video != null) {
            $video = $explode_video[0]['download_link'];
        }
        
        
         $page = $page->load('translations');
         
         
        $success = request('success');
        $course_reservation = CourseReservation::find($course_reservation_id);
        if($course_reservation->payment_option == 1)
            $cost = $course_reservation->course->course_cost_after;
        else
            $cost = $course_reservation->course->course_reservation_cost;
        $invoice = Invoice::create([
            'invoice_number'=>rand(1000,100000),
            'mobile_number'=>$course_reservation->phone_number,
            'invoice_date'=>$course_reservation->created_at->format("Y-m-d"),
            'invoice_time'=>$course_reservation->created_at->format('h:m:s'),
            'cost'=>$cost,
            'name'=>$course_reservation->name,
            'details'=>$course_reservation->course->course_name,

        ]);
        return view("course_reservation_message", compact('success', 'course_reservation','invoice','page','video'));
    }
    function ArabicNumbersToEnglish($string) {
        return strtr($string, array('۰' => '0', '۱' => '1', '۲' => '2', '۳' => '3', '۴' => '4', '۵' => '5', '۶' => '6', '۷' => '7', '۸' => '8', '۹' => '9', '٠' => '0', '١' => '1', '٢' => '2', '٣' => '3', '٤' => '4', '٥' => '5', '٦' => '6', '٧' => '7', '٨' => '8', '٩' => '9'));
    }

    function getCoursePrice($id, $payment_type)
    {
        $course = Course::where('id', $id)->first();
        if ($payment_type == 1)
        $price = $course->course_cost_after;
        else
        $price = $course->course_reservation_cost;
        $course_cost_before = $course->course_cost_before;
        return response()->json([
            'Price' => $price,
            'OldPrice' => $course_cost_before,
            'Status' => 1

        ]);
    }
}
