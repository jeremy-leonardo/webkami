<?php

namespace App\Http\Controllers;

use App\ClientInformation;
use App\Project;
use App\ProjectDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Exception;
use Illuminate\Support\Facades\DB;

class ProjectDetailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function create()
    {
        if (!ClientInformation::where('user_id', Auth::user()->id)->exists()) {
            return redirect('dashboard');
        }
        return view('dashboard.project-detail.create');
    }

    protected function validator(Request $request)
    {
        return Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'project_category' => ['required', 'string', 'max:255'],
            'deadline' => ['date'],
            'budget' => ['required', 'numeric'],
        ]);
    }

    protected function store(Request $request)
    {
        $validator = $this->validator($request);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        if (!ClientInformation::where('user_id', Auth::user()->id)->exists()) {
            return redirect('dashboard');
        }

        ProjectDetail::create([
            'client_user_id' => Auth::user()->id,
            'title' => $request['title'],
            'description' => $request['description'],
            'project_category_id' => $request['project_category'],
            'deadline' => $request['deadline'],
            'budget' => $request['budget'],
        ]);

        return redirect('dashboard')->with(['status' => 'Success creating project']);
    }

    public function index(Request $request)
    {
        $db_config = (object) DB::connection()->getConfig();
        $db_type = $db_config->driver;
        $search = $request->input('search');
        $project_details = ProjectDetail::where('is_taken', '=', FALSE)
            ->where(function ($query) use ($search, $db_type) {
                if ($db_type == 'pgsql') {
                    $query->where('title', 'ilike', "%$search%")
                        ->orWhere('description', 'ilike', "%$search%");
                } else {
                    $query->where('title', 'like', "%$search%")
                        ->orWhere('description', 'like', "%$search%");
                }
            })->paginate(5);
        return view('project-detail.index', ['project_details' => $project_details]);
    }

    public function show($id)
    {
        $project_detail = ProjectDetail::find($id);
        return view('project-detail.show', ['project_detail' => $project_detail]);
    }

    public function take($id)
    {
        $project_detail = ProjectDetail::find($id);

        Project::create([
            'project_detail_id' => $id,
            'project_status_id' => 1,
            'developer_user_id' => Auth::user()->id
        ]);

        $project_detail->is_taken = TRUE;
        $project_detail->save();

        return redirect('dashboard')->with(['status' => 'Success taking the project']);
    }

    public function edit($id)
    {
        $project_detail = ProjectDetail::find($id);
        if (Auth::user()->id == $project_detail->client_user_id) {
            return view('project-detail.edit', ['project_detail' => $project_detail]);
        }
    }

    public function update($id, Request $request)
    {
        $project_detail = ProjectDetail::find($id);
        if (Auth::user()->id == $project_detail->client_user_id) {
            $validator = $this->validator($request);
            if ($validator->fails()) {
                return back()->withInput()->withErrors($validator);
            }
            $project_detail->title = $request['title'];
            $project_detail->description = $request['description'];
            $project_detail->project_category_id = $request['project_category'];
            $project_detail->deadline = $request['deadline'];
            $project_detail->budget = $request['budget'];
            $project_detail->save();
            return redirect('dashboard')->with(['status' => 'Success updating project']);
        } else {
            return redirect('dashboard');
        }
    }
}
