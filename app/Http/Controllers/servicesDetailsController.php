<?php

namespace App\Http\Controllers;
use App\Models\Page;

use App\Models\servicesDetails;
use Illuminate\Http\Request;

class servicesDetailsController extends Controller
{
    function index(){
        $page = Page::where('model_name', 'servicesDetails')->get()->first();
        $servicesDetails = servicesDetails::all();
        $video ="";
        $explode_video = json_decode($page->video, true);
        if(!empty($explode_video)&& $page->video != null) {
            $video = $explode_video[0]['download_link'];
        }
        $page = $page->load('translations');
        $servicesDetails = $servicesDetails->load('translations');
        return view('servicesDetails', ['servicesDetails' => $servicesDetails,'page' => $page, 'video'=>$video]);
    }
}
