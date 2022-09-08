<?php

namespace App\Http\Controllers;


use App\Models\Managers;
use App\Models\Page;
use Illuminate\Http\Request;

class ManagersController extends Controller
{
    function index(){
        $page = Page::where('model_name', 'Managers')->get()->first();
        $Managers = Managers::all();
        $Managers = $Managers->load('translations');
        $video ="";
        $explode_video = json_decode($page->video, true);
        if(!empty($explode_video)&& $page->video != null) {
            $video = $explode_video[0]['download_link'];
        }
        $page = $page->load('translations');
        return view('Managers', ['Managers' => $Managers, 'page' => $page,'video'=>$video]);
    }
}
