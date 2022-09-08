<?php

namespace App\Http\Controllers;

use App\Models\Managers;
use App\Models\Page;
use App\Models\teamWork;
use Illuminate\Http\Request;

class teamWorkController extends Controller
{
    function index(){
        $page = Page::where('model_name', 'teamWork')->get()->first();
        $teamWorks = teamWork::all();
        $teamWorks = $teamWorks->load('translations');
        $video ="";
        $explode_video = json_decode($page->video, true);
        if(!empty($explode_video)&& $page->video != null) {
            $video = $explode_video[0]['download_link'];
        }
        $page = $page->load('translations');
        return view('teamWork', ['teamWorks' => $teamWorks, 'page' => $page,'video'=>$video]);
    }
}
