<?php

namespace App\Http\Controllers;
use App\Models\AboutUs;
use App\Models\Page;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    function index(){
        $page = Page::where('model_name', 'AboutUs')->get()->first();
        $AboutUs = AboutUs::all();
        $video ="";
        $explode_video = json_decode($page->video, true);
        if(!empty($explode_video)&& $page->video != null) {
            $video = $explode_video[0]['download_link'];
        }
        $page = $page->load('translations');
        $AboutUs = $AboutUs->load('translations');
        return view('AboutUs', ['AboutUs' => $AboutUs, 'page' => $page ,'video'=>$video]);
    }
}
