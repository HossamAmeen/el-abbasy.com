<?php

namespace App\Http\Controllers;


use App\Models\Graduate;
use App\Models\Page;
use Illuminate\Http\Request;
use TCG\Voyager\Voyager;
use Lang;
use Illuminate\Support\Facades\App;

class EetaController extends Controller
{
    function index(){
        $page = Page::where('model_name', 'graduation')->get()->first();
        $graduates = Graduate::all();
        $video ="";
        $explode_video = json_decode($page->video, true);
        if(!empty($explode_video)&& $page->video != null) {
            $video = $explode_video[0]['download_link'];
        }
        $page = $page->load('translations');
        $graduates = $graduates->load('translations');
        return view('EETA_graduation_page', ['graduates' => $graduates, 'page' => $page ,'video'=>$video]);
    }
    function check_page(){
        $page = Page::where('model_name', 'cirtificate')->get()->first();
        $graduates = Graduate::all();
        $video ="";
        $explode_video = json_decode($page->video, true);
        if(!empty($explode_video)&& $page->video != null) {
            $video = $explode_video[0]['download_link'];
        }
        $page = $page->load('translations');
        $graduates = $graduates->load('translations');
        return view('EETA_check_cirtificate', ['graduates' => $graduates, 'page' => $page ,'video'=>$video]);
    }
    function check(){
        $locale = App::currentLocale();
        $cart= "";
        $certificate_id =\request('certificate_id');
        if(Graduate::whereCertificateId($certificate_id)->exists()){
            $graduate = Graduate::whereCertificateId($certificate_id)->get();
            $graduate = $graduate->load('translations');
            $image_profile = Voyager::image($graduate[0]->image);
            $prog = Lang::get('training program');
            $national_id = Lang::get('National ID');
            $faculty = Lang::get('faculty');
            $total = Lang::get('total grade');
            $attendance = Lang::get('attendance grade');
            $certificateID = Lang::get('Certificate ID');
            $cart = "
                        <div class='box_img'>
                            <div class='img_parent'>
                                <img src='{$image_profile}' alt=''>
                            </div>
                        </div>
                        <h5>{$graduate[0]->translate($locale)->name }</h5>
                        <ul class='list-unstyled'>
                            <li><span>{$prog} :</span><span class='answer'>{$graduate[0]->translate($locale)->course}</span></li>
                            <li><span>{$national_id} :</span><span class='answer'>{$graduate[0]->national_id }</span></li>
                            <li><span>{$faculty} :</span><span class='answer'>{$graduate[0]->translate($locale)->faculty }</span></li>
                            <li><span> {$attendance} :</span><span class='answer'>{$graduate[0]->translate($locale)->attendance_grade }</span></li>
                            <li><span>{$total} :</span><span class='answer'>{$graduate[0]->translate($locale)->total_grade }</span></li>
                            <li><span>{$certificateID} :</span><span class='answer'>{$graduate[0]->certificate_id }</span></li>
                        </ul>
            ";
            return response()->json([
                'Cart_Model' => $cart,
                'Status' => 1
            ]);
         //   var_dump("found");
        }else{
            return response()->json([
                'Status' => 0
            ]);
          //  var_dump( "not found");
        }
       // die();
    }
}
