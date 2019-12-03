<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Patient;
use App\User;
use App\Role;

class PatientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::all();

        return view('admin.doctors.index')->with([
          'patients' => $patients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'phone' => 'required',
            'date_started' => 'required',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('secret');

        $user->save();

        $patient = new Patient();
        $patient->address = $request->input('address');
        $patient->phone = $request->input('phone');
        $patient->date_started = $request->input('date_started');
        $patient->user_id = $user->id;
        $patient->save();

        return redirect()->route('admin.patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::findOrFail($id);

        return view('admin.patients.show')->with([
          'patient' => $patient
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);

        return view('admin.patients.edit')->with([
          'patient' => $patient
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $patient = Patient::findOrFail($id);

      $request->validate([
        'address' => 'required',
        'phone' => 'required',
        'date_started' => 'required',
      ]);

      $patient->address = $request->input('address');
      $patient->phone = $request->input('phone');
      $patient->date_started = $request->input('date_started');
      $patient->save();

      return redirect()->route('admin.patients.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);

        $patient->delete();

        return redirect()->route('admin.patients.index');
    }
}
