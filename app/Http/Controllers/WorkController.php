<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Page;
use App\Models\WorkCategory;
use App\Enums\WorkStatus;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = Page::where('model_name', 'Work')->get()->first();
        $video ="";
        $explode_video = json_decode($page->video, true);
        if(!empty($explode_video)&& $page->video != null) {
            $video = $explode_video[0]['download_link'];
        }
        $categories = WorkCategory::all();
        $categories = $categories->load('work_sub_categories', 'work_sub_categories.works');
        $page = $page->load('translations');
        return view('our_works', ['page' => $page, 'categories' => $categories, 'video' =>$video]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::where('model_name', 'work_details')->get()->first();
        $video ="";
        $explode_video = json_decode($page->video, true);
        if(!empty($explode_video)&& $page->video != null) {
            $video = $explode_video[0]['download_link'];
        }
        $media_data = array();
        $work = Work::findOrFail($id);
        $url = URL::current();
        $decoded_media_filed = json_decode($work->media,true);
        if(!empty($decoded_media_filed)){
            foreach ($decoded_media_filed as $media) {
                $original_file = pathinfo($media['original_name']);
                $extension = strtolower($original_file['extension']);
                $download_link = $media['download_link'];
                array_push($media_data, json_encode(['file_extension' => $extension,
                    'download_link' => $download_link]));
            }
        }
        $page = $page->load('translations');
        return view('our_works_details', ['page' => $page, 'work' => $work, 'media' => $media_data, 'url' => $url, 'video' =>$video]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
