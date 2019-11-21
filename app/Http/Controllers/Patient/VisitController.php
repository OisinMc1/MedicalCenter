<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Visit;

class VisitController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:patient');
    }

    public function index()
    {
        $visits = Visit::all();

        return view('patient.visits.index')->with([
          'visits' => $visits
        ]);
    }

    public function show($id)
    {
        $visit = Visit::findOrFail($id);

        return view('patient.visits.show')->with([
          'visit' => $visit
        ]);
    }

}
