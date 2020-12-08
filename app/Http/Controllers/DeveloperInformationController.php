<?php

namespace App\Http\Controllers;

use App\DeveloperInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Exception;
use Illuminate\Support\Facades\DB;

class DeveloperInformationController extends Controller
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
        if (DeveloperInformation::where('user_id', Auth::user()->id)->exists()) {
            return redirect('dashboard');
        }
        return view('dashboard.developer-information.create');
    }

    protected function validator(Request $request)
    {
        return Validator::make($request->all(), [
            'last_formal_education_level' => ['required'],
            'last_formal_education_institution' => ['required', 'string', 'max:255'],
            'last_formal_education_field_of_study' => ['required', 'string', 'max:255'],
            'current_formal_education_level' => ['required'],
            'current_formal_education_institution' => ['required', 'string', 'max:255'],
            'current_formal_education_field_of_study' => ['required', 'string', 'max:255'],
            'other_education' => ['nullable', 'string'],
            'skills' => ['string', 'max:255'],
            'portfolio_link' => ['nullable', 'string', 'max:255'],
            'linkedin_link' => ['nullable', 'string', 'max:255'],
            'phone' => ['required', 'numeric'],
        ]);
    }

    protected function store(Request $request)
    {
        $validator = $this->validator($request);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        if (DeveloperInformation::where('user_id', Auth::user()->id)->exists()) {
            return redirect('dashboard');
        }

        DB::beginTransaction();
        try {

            DeveloperInformation::create([
                'user_id' => Auth::user()->id,
                'last_formal_education_level_id' => $request['last_formal_education_level'],
                'last_formal_education_institution' => $request['last_formal_education_institution'],
                'last_formal_education_field_of_study' => $request['last_formal_education_field_of_study'],
                'current_formal_education_level_id' => $request['current_formal_education_level'],
                'current_formal_education_institution' => $request['current_formal_education_institution'],
                'current_formal_education_field_of_study' => $request['current_formal_education_field_of_study'],
                'other_education' => $request['other_education'],
                'skills' => $request['skills'],
                'portfolio_link' => $request['portfolio_link'],
                'linkedin_link' => $request['linkedin_link'],
                'phone' => $request['phone'],
            ]);

            $user = Auth::user();
            $user->is_developer = TRUE;
            $user->save();

            DB::commit();
        } catch (Exception $exc) {
            DB::rollback();
            return response()->json(['error' => $exc->getMessage()], 500);
        }



        return redirect('dashboard')->with(['status' => 'Success completing information']);
    }

    public function edit($id)
    {
        $developer_information = DeveloperInformation::find($id);
        if (Auth::user()->id == $developer_information->user_id) {
            return view('dashboard.developer-information.edit', ['developer_information' => $developer_information]);
        }
    }

    public function update($id, Request $request)
    {
        $developer_information = DeveloperInformation::find($id);
        if (Auth::user()->id == $developer_information->user_id) {
            $validator = $this->validator($request);
            if ($validator->fails()) {
                return back()->withInput()->withErrors($validator);
            }
            $developer_information->last_formal_education_level_id = $request['last_formal_education_level'];
            $developer_information->last_formal_education_institution = $request['last_formal_education_institution'];
            $developer_information->last_formal_education_field_of_study = $request['last_formal_education_field_of_study'];
            $developer_information->current_formal_education_level_id = $request['current_formal_education_level'];
            $developer_information->current_formal_education_institution = $request['current_formal_education_institution'];
            $developer_information->current_formal_education_field_of_study = $request['current_formal_education_field_of_study'];
            $developer_information->other_education = $request['other_education'];
            $developer_information->skills = $request['skills'];
            $developer_information->portfolio_link = $request['portfolio_link'];
            $developer_information->linkedin_link = $request['linkedin_link'];
            $developer_information->phone = $request['phone'];
            $developer_information->save();
            return redirect('dashboard')->with(['status' => 'Success updating information']);
        } else {
            return redirect('dashboard');
        }
    }
}
