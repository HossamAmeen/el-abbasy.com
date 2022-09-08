<?php

namespace App\Http\Controllers;


use App\Models\Package;
use Carbon\Carbon;
use App\Models\Page;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $page = Page::where('model_name', 'package')->get()->first();
        $packages = Package::where('end_date', '>=', Carbon::today())->get();
        $video ="";
        $explode_video = json_decode($page->video, true);
        if(!empty($explode_video)&& $page->video != null) {
            $video = $explode_video[0]['download_link'];
        }
        $page = $page->load('translations');
        $packages = $packages->load('translations');
        return view('packages', ['page' => $page,  'packages' => $packages, 'video'=>$video]);
    }

    public function detail($id)
    {
        $url = URL::current();
        $page = Page::where('model_name', 'package_details')->get()->first();
        $package = Package::find($id);
        $package_details = $package->packagedetails();
        $video ="";
        $explode_video = json_decode($page->video, true);
        if(!empty($explode_video)&& $page->video != null) {
            $video = $explode_video[0]['download_link'];
        }
        $page = $page->load('translations');
        $package = $package->load('translations');
        $package_details = $package_details->load('translations');

        return view('package_details', ['package' => $package,'page' => $page, 'package_details'=> $package_details, 'video'=>$video ,'url'=>$url ]);
    }

}
