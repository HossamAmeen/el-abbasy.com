<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Page;
use App\Enums\ProjectStatus;

class ProjectsController extends Controller
{
    public function index()
    {
        $page = Page::where('model_name', 'project')->get()->first();
        $in_progress_projects = Project::where('status', ProjectStatus::in_progress)->get();
        $finished_projects = Project::where('status', ProjectStatus::finished)->get();
        $in_progress_projects = $in_progress_projects->load('translations');
        $finished_projects = $finished_projects->load('translations');

        return view('works', ['page' => $page, 'in_progress_projects' => $in_progress_projects, 'finished_projects' => $finished_projects]);
    }
}
