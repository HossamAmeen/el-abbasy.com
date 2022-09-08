<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Mistake;
use Illuminate\Http\Request;

class MistakesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Mistake $mistake
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mistake = Mistake::find($id);
        $page = Page::where('model_name', 'mistake')->get()->first();
        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $video = "";
        $explode_video = json_decode($page->video, true);
        if(!empty($explode_video)&& $page->video != null) {
            $video = $explode_video[0]['download_link'];
        }
        $page = $page->load('translations');
        $mistake = $mistake->load('translations');
        return view('mistake_details', ['mistake' => $mistake, 'url' => $url, 'page' => $page, 'video' => $video]);
    }
}
