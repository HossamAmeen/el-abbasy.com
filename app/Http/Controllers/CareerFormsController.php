<?php

namespace App\Http\Controllers;

use App\Enums\JobStatus;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\CareerForm;
use Carbon\Carbon;
use App\Mail\JobMailer;
use Illuminate\Support\Facades\Mail;
use DB;
use Lang;

class CareerFormsController extends Controller
{
    public function store()
    {
        $messages = [
            'name.required' => Lang::get('A name is required'),
            'email.required' => Lang::get('An email is required'),
            'skills.required' => Lang::get('An skills is required'),
            'nationality.required' => Lang::get('An nationality Title is required'),
            'national_id.required' => Lang::get('An National id is required'),
            'national_id.size' => Lang::get('An National id should be 14 digits'),
            'number.required' => Lang::get('An number is required'),
            'birthday.required' => Lang::get('An birthday is required'),
            'qualification_type.required' => Lang::get('An qualification type is required'),
            'qualification_name.required' => Lang::get('An qualification name is required'),
            'qualification_number.required' => Lang::get('University Name is required'),
            // 'qualification_number.regex' => Lang::get('An qualification number should be 11 digits'),
            'job_id.required' => Lang::get('An job is required'),
            'address.required' => Lang::get('An Address is required'),
            'number.regex' => Lang::get('An number should be 11 digits')

        ];

        $roles = [
            'name' => 'required',
            'email' => 'required',
            'skills' => 'required',
            'nationality' => 'required',
            'national_id' => 'required|size:14',
            'number' => 'required|regex:/(01)[0-9]{9}/',
            'birthday' => 'required',
            'sex_type' => 'required',
            'qualification_type' => 'required',
            'qualification_name' => 'required',
            'qualification_number' => 'required',
            'job_id' => 'required',
            'address' => 'required',
        ];
        $this->validate(\request(), $roles, $messages);

        $career_form = new CareerForm();
        $career_form->name = \request('name');
        $career_form->email = \request('email');
        $career_form->skills = \request('skills');
        $career_form->nationality = \request('nationality');
        $career_form->national_id = \request('national_id');
        $career_form->number = \request('number');
        $career_form->birthday = \request('birthday');
        $career_form->sex_type = \request('sex_type');

        if ($career_form->sex_type == '0') {
            $career_form->military_status = \request('military_status');
        } else {
            $career_form->civil_service = \request('civil_status');
        }
        $career_form->qualification_type = \request('qualification_type');
        $career_form->qualification_name = \request('qualification_name');
        $career_form->qualification_number = \request('qualification_number');
        $career_form->job_id = \request('job_id');

        $career_form->address = \request('address');

        $inserted_experience = array();

        $career_form->save();

        if (\request('experience') != null) {
            $number = count(\request('experience'));
            for ($i = 0; $i < $number; $i++) {
                array_push($inserted_experience, ["company_name" => \request('experience')[$i]['company-name'],
                    "job_title" => \request('experience')[$i]['job-name'],
                    "start_year" => \request('experience')[$i]['start-date'],
                    "end_year" => \request('experience')[$i]['end-date'],
                    "salary" => \request('experience')[$i]['net-salary'],
                    "note" => \request('experience')[$i]['leave-reason'],
                    "career_form_id" => $career_form->id,
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now()]);
            }
            DB::table('experiences')->insert($inserted_experience);
            if (!$career_form->save()) {
                return redirect('/joinUs');
            } else {
                $success = 1;
                $page = Page::where('model_name', 'joinUs')->get()->first();
                $jobs = Job::where('status', JobStatus::active)->get();
                $video = "";
                $explode_video = json_decode($page->video, true);
                if(!empty($explode_video)&& $page->video != null) {
                    $video = $explode_video[0]['download_link'];
                }
                $jobs = $jobs->load('translations');
                $page = $page->load('translations');
                Mail::to(env('MAIL_TO'))->send(new JobMailer(env('MAIL_TO'), $career_form->name, $career_form->number));
                return view('joinUs', ['jobs' => $jobs, 'page' => $page, 'video' => $video]);
            }
        } else {
            if (!$career_form->save()) {
                return redirect('/joinUs');
            } else {
                $success = 1;
                $page = Page::where('model_name', 'joinUs')->get()->first();
                $jobs = Job::where('status', JobStatus::active)->get();
                $video = "";
                $explode_video = json_decode($page->video, true);
                if(!empty($explode_video)&& $page->video != null) {
                    $video = $explode_video[0]['download_link'];
                }
                $jobs = $jobs->load('translations');
                $page = $page->load('translations');
                Mail::to(env('MAIL_TO'))->send(new JobMailer(env('MAIL_TO'), $career_form->name, $career_form->number));
                return view('joinUs', ['success' => $success, 'jobs' => $jobs, 'page' => $page, 'video' => $video]);
            }
        }
    }

    public function index()
    {
//    $jobs = Job::all();
        $page = Page::where('model_name', 'joinUs')->get()->first();
        $video = "";
        $explode_video = json_decode($page->video, true);
        if(!empty($explode_video)&& $page->video != null) {
            $video = $explode_video[0]['download_link'];
        }
        $jobs = Job::where('status', JobStatus::active)->get();
        $jobs = $jobs->load('translations');
        $page = $page->load('translations');
        return view('joinUs', ['jobs' => $jobs, 'page' => $page, 'video' => $video]);
    }
}
