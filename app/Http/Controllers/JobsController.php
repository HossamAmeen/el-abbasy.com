<?php

namespace App\Http\Controllers;



use App\Enums\JobStatus;
use App\Models\Job;
use App\Models\Page;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    function index(){
        $page = Page::where('model_name', 'Job')->get()->first();
        $Jobs = Job::where('status', JobStatus::active)->get();
        $video ="";
        $explode_video = json_decode($page->video, true);
        if(!empty($explode_video)&& $page->video != null) {
            $video = $explode_video[0]['download_link'];
        }
        $page = $page->load('translations');
        $Jobs = $Jobs->load('translations');
        return view('jobs', ['page' => $page ,'Jobs' => $Jobs, 'video'=>$video ]);

    }
}
