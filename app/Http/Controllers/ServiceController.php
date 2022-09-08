<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    function index(){

        $Service = Service::all();
        $Service = $Service->load('translations');
        $video = json_decode(setting('site.video'))[0]->download_link;
        return view('Service', ['Service' => $Service , 'video' =>$video]);
    }
}
