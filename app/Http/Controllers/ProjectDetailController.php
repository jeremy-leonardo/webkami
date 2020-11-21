<?php

namespace App\Http\Controllers;

use App\ClientInformation;
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
        $this->middleware('auth');
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
}
