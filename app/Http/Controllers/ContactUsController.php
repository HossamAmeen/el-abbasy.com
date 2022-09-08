<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Branches;
use App\Models\ContactUs;
use App\Models\Page;
use Illuminate\Http\Request;
use Lang;

class ContactUsController extends Controller
{

    public function submit() {
        $contact = new ContactUs();
        $contact->name = \request('name');
        $contact->number = \request('number');
        $contact->email = \request('email');
        $contact->message_title = \request('message_title');
        $contact->message = \request('message');


        $messages = [
            'name.required' => Lang::get('A name is required'),
            'email.required' => Lang::get('An email is required'),
            'number.required' => Lang::get('An number is required'),
            'number.regex' => Lang::get('An number should be 11 digits'),
            'message_title.required' => Lang::get('An Message Title is required'),
            'message.required' => Lang::get('An Message is required')
        ];

        $roles = [
            'name' => 'required',
            'email' => 'required',
            'number' => 'required|regex:/(01)[0-9]{9}/',
            'message_title' => 'required',
            'message' => 'required'
        ];
       // alert()->info('some else wrong');
        $this->validate(\request(), $roles, $messages);

        $contact->save();
        if ( ! $contact->save())
        {
            return redirect('/contactUs');
        }else {
            $success = 1;
            $page = Page::where('model_name', 'ContactUs')->get()->first();
            $Branches = Branches::all();
            $video ="";
            $explode_video = json_decode($page->video, true);
            if(!empty($explode_video)&& $page->video != null) {
                $video = $explode_video[0]['download_link'];
            }
            $page = $page->load('translations');
            return view('/contactUs',['success' => $success,'page' => $page , 'Branches'=> $Branches, 'video'=>$video ]);
        }
       // alert()->info($this->validate(\request(), $roles, $messages));
       // $success = 0;
        //return redirect('/contactUs',['success' => $success ]);
    }

    function index(){

        $page = Page::where('model_name', 'ContactUs')->get()->first();
        $Branches = Branches::all();
        $video ="";
        $explode_video = json_decode($page->video, true);
        if(!empty($explode_video)&& $page->video != null) {
            $video = $explode_video[0]['download_link'];
        }
        $page = $page->load('translations');
        return view('contactUs',['page' => $page , 'Branches'=> $Branches, 'video'=>$video ]);
    }
}
