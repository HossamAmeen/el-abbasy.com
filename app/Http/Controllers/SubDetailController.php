<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\servicesDetails;
use Illuminate\Http\Request;

class SubDetailController extends Controller
{
    public function detail($id)
    {
        $page = Page::where('model_name', 'Details')->get()->first();
        $sub_details = servicesDetails::find($id);
        $sub_details_images = $sub_details->images;
        $page = $page->load('translations');
        $sub_details = $sub_details->load('translations');
        return view('sub_details', ['sub_details' => $sub_details,'page' => $page, 'sub_details_images'=> $sub_details_images ]);
    }
}
