<?php



namespace App\Http\Controllers\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Visit;
use App\Doctor;
use Illuminate\Support\Facades\Auth;
use App\Patient;
use App\User;
class VisitController extends Controller
{
  public function __construct()
{
    $this->middleware('auth');
    $this->middleware('role:doctor');
}
  public function index()
  {
    $visits = Visit::all();
    $visits = Visit::paginate(5);
    return view('doctor.visits.index')->with([
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
    $doctors = Doctor::all();
    $patients = Patient::all();
    return view('doctor.visits.create')->with([
        'doctors' => $doctors,
        'patients' => $patients
      ]);
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
    'date' => 'required|max:191',
    'time' => 'required|max:191'
]);
    $visit = new Visit();
    $visit->date = $request->input('date');
    $visit->time = $request->input('time');
    $visit->patient_id = $request->input('patient_id');
    $visit->doctor_id = $request->input('doctor_id');
    $visit->cost_of_visit = $request->input('cost_of_visit');
    $visit->save();
    return redirect()->route('doctor.visits.index');
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
    return view('doctor.visits.show')->with([
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
    $patient = Patient::findOrFail($id);
    $patients = Patient::all();
    $doctors = Doctor::all();
    $visit = Visit::findOrFail($id);
    return view('doctor.visits.edit')->with([
      'patient' => $patient,
      'patients' => $patients,
      'visit' => $visit,
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
  public function update(Request $request, $id)
  {
    $visit = Visit::findOrFail($id);
    $request->validate([
    'date' => 'required|max:191',
    'time' => 'required|max:191',
    'cost_of_visit' => 'required|numeric'
]);
    $visit->date = $request->input('date');
    $visit->time = $request->input('time');
    $visit->patient_id = $request->input('patient_id');
    $visit->doctor_id = $request->input('doctor_id');
    $visit->cost_of_visit = $request->input('cost_of_visit');
    $visit->save();
    return redirect()->route('doctor.visits.index');
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
    return redirect()->route('doctor.visits.index');
  }
}
