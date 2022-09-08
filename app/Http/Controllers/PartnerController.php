<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    function index(){
        $page = Page::where('model_name', 'Partner')->get()->first();
        $Partners = Partner::all();
        $video ="";
        $explode_video = json_decode($page->video, true);
        if(!empty($explode_video)&& $page->video != null) {
            $video = $explode_video[0]['download_link'];
        }
        $Partners = $Partners->load('translations');
        return view('partners', ['Partners' => $Partners, 'page' => $page , 'video'=>$video]);
    }
}
