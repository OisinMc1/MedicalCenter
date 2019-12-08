@extends('layouts.app')

@section('content')
<div class="container">
  <div class ="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Visits
        </div>
        <div class="card-body">
          @if (count($visits) === 0)
          <p> There are no Visits</p>
          @else
          <table id="table-visits" class="table table-hover">
            <thead>
              <th>Doctor</th>
              <th>Patient</th>
              <th>Date</th>
              <th>Time</th>
              <th>Cost</th>
              <th></th>
            </thead>

            <!-- Patients Table -->

            <tbody>
              @foreach ($visits as $visit)
              @if ($visit->patient->user->id == Auth::user()->id)
              <tr data-id="{{ $visit->id }}">
                <td>{{ $visit->doctor->user->name }}</td>
                <td>{{ $visit->patient->user->name }}</td>
                <td>{{ $visit->date}}</td>
                <td>{{ $visit->time}}</td>
                <td>{{ $visit->cost_of_visit}}</td>
                <td>

                  <form style="display:inline-block" method="POST" action="{{route('patient.visits.destroy',$visit->id)}}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="form-control btn btn-danger">Cancel Visit</a>
                  </form>
                </td>
              </tr>
              @endif
              @endforeach
          </tbody>
        </table>
        @endif
        {{ $visits->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
