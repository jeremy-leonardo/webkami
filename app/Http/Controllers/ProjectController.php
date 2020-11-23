<?php

namespace App\Http\Controllers;

use App\ClientInformation;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Exception;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function changeStatus($project_id, $target_project_status_id){
        $project = Project::find($project_id);
        $project->project_status_id = $target_project_status_id;
        $project->save();
        return back();
    }

}
