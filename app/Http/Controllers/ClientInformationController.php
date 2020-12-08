<?php

namespace App\Http\Controllers;

use App\ClientInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Exception;
use Illuminate\Support\Facades\DB;

class ClientInformationController extends Controller
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
        if (ClientInformation::where('user_id', Auth::user()->id)->exists()) {
            return redirect('dashboard');
        }
        return view('dashboard.client-information.create');
    }

    protected function validator(Request $request)
    {
        return Validator::make($request->all(), [
            'company' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'field' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric'],
        ]);
    }

    protected function store(Request $request)
    {
        $validator = $this->validator($request);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        if (ClientInformation::where('user_id', Auth::user()->id)->exists()) {
            return redirect('dashboard');
        }

        DB::beginTransaction();
        try {

            ClientInformation::create([
                'user_id' => Auth::user()->id,
                'company' => $request['company'],
                'description' => $request['description'],
                'field' => $request['field'],
                'phone' => $request['phone'],
            ]);

            $user = Auth::user();
            $user->is_client = TRUE;
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
        $client_information = ClientInformation::find($id);
        if (Auth::user()->id == $client_information->user_id) {
            return view('dashboard.client-information.edit', ['client_information' => $client_information]);
        }
    }

    public function update($id, Request $request)
    {
        $developer_information = ClientInformation::find($id);
        if (Auth::user()->id == $developer_information->user_id) {
            $validator = $this->validator($request);
            if ($validator->fails()) {
                return back()->withInput()->withErrors($validator);
            }
            $developer_information->company = $request['company'];
            $developer_information->description = $request['description'];
            $developer_information->field = $request['field'];
            $developer_information->phone = $request['phone'];
            $developer_information->save();
            return redirect('dashboard')->with(['status' => 'Success updating information']);
        } else {
            return redirect('dashboard');
        }
    }
}
