<?php

namespace App\Http\Controllers;

use App\DeveloperInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

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
        return redirect('dashboard')->with(['status' => 'Success completing information']);
    }

}
