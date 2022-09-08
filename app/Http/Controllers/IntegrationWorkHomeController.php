<?php

namespace App\Http\Controllers;


use App\Models\Page;
use Illuminate\Http\Request;

class IntegrationWorkHomeController extends Controller
{
    function index(){

        $page = Page::where('model_name', 'IntegrationWorkHome')->get()->first();
        $video ="";
        $explode_video = json_decode($page->video, true);
        if(!empty($explode_video)&& $page->video != null) {
            $video = $explode_video[0]['download_link'];
        }
        $page = $page->load('translations');

        return view('integration_work_home', [ 'page' => $page ,'video'=>$video]);
    }
}
