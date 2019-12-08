<?php

//DoctorAdmin Controller

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
use App\User;
use App\Role;

class DoctorController extends Controller
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

    //DoctorAdmin index Function

    public function index()
    {
        $doctors = Doctor::all();

        return view('admin.doctors.index')->with([
          'doctors' => $doctors
        ]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //DoctorAdmin create Function

    public function create()
    {
        return view('admin.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //DoctorAdmin store Function

    public function store(Request $request)
    {
        $role_doctor = Role::where('name', 'doctor')->first();

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'date_started' => 'required'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_doctor);

        $doctor = new Doctor();
        $doctor->address = $request->input('address');
        $doctor->phone = $request->input('phone');
        $doctor->date_started = $request->input('date_started');
        $doctor->user_id = $user->id;
        $doctor->save();

        return redirect()->route('admin.doctors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //DoctorAdmin show Function


    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);

        return view('admin.doctors.show')->with([
          'doctor' => $doctor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //DoctorAdmin edit Function

    public function edit($id)
    {
        $doctors = Doctor::findOrFail($id);

        return view('admin.doctors.edit')->with([
          'doctors' => $doctors
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //DoctorAdmin update Function

    public function update(Request $request, $id)
    {
      $doctor = Doctor::findOrFail($id);

      $request->validate([
        'address' => 'required',
        'phone' => 'required',
        'date_started' => 'required',
      ]);

      $doctor->address = $request->input('address');
      $doctor->phone = $request->input('phone');
      $doctor->date_started = $request->input('date_started');
      $doctor->save();

      return redirect()->route('admin.doctors.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //DoctorAdmin destroy Function

    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);

        $doctor->delete();

        return redirect()->route('admin.doctors.index');
    }
}
