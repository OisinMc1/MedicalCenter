<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function index(Request $request)
     {
       $user = $request->user();
       $home = 'patient.home';

       if ($user->hasRole('admin')){
         $home = 'admin.home';
       }
       else {
         $home = 'patient.home';

       }

       if ($user->hasRole('doctor')){
         $home = 'doctor.home';
       }
       else {
       }
         return redirect()->route($home);
     }

}
