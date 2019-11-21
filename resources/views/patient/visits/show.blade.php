@extends('layouts.app')

@section('content')
<div class="container">
  <div class ="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Visits
        </div>
        <div class="card-body">
          <table class="table table-hover">
            <thead>
            </thead>
            <tbody>
              <tr>
              <th>Date</th>
              <td>{{ $visit->date }}</td>
            </tr>
            <tr>
              <th>Time</th>
              <td>{{ $visit->time }}</td>
            </tr>
            <tr>
              <th>Cost of Visit</th>
              <td>{{ $visit->cost_of_visit }}</td>
            </tr>
            <tr>
            </tbody>
        </table>
        <a href="{{ route('patient.visits.index') }}" class="btn btn-default">Back</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
