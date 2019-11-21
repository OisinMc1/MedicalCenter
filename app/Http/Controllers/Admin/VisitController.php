<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Visit;

class VisitController extends Controller
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
        $visits = Visit::all();

        return view('admin.visits.index')->with([
          'visits' => $visits
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.visits.create');
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
          'date' => 'required',
          'time' => 'required',
          'cost_of_visit' => 'required',

        ]);

        $visit = new Visit();
        $visit->date = $request->input('date');
        $visit->time = $request->input('time');
        $visit->cost_of_visit = $request->input('cost_of_visit');

        $visit->save();

        return redirect()->route('admin.visits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visit = Visit::findOrFail($id);

        return view('admin.visits.show')->with([
          'visit' => $visit
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
        $visit = Visit::findOrFail($id);

        return view('admin.visits.edit')->with([
          'visit' => $visit
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
      $visit = Visit::findOrFail($id);

      $request->validate([
        'date' => 'required',
        'time' => 'required',
        'cost_of_visit' => 'required',
      ]);

      $visit->date = $request->input('date');
      $visit->time = $request->input('time');
      $visit->cost_of_visit = $request->input('cost_of_visit');
      $visit->save();

      return redirect()->route('admin.visits.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visit = Visit::findOrFail($id);

        $visit->delete();

        return redirect()->route('admin.visits.index');
    }
}
