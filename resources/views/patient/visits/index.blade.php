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
          @if (count($visits) === 0 )
          <p> There are no Visit</p>
          @else
          <table id="table-visits" class="table table-hover">
            <thead>
              <th>Date</th>
              <th>Time</th>
              <th>Cost of Visit</th>

            </thead>
            <tbody>
              @foreach ($visits as $visit)
              <tr data-id="{{ $visit->id }}">
                <td>{{ $visit->date }}</td>
                <td>{{ $visit->time }}</td>
                <td>{{ $visit->cost_of_visit }}</td>
                <td>
                  <a href="{{ route('patient.visits.show',$visit->id) }}" class="btn btn-default">View</a>
                </td>
              </tr>
              @endforeach
          </tbody>
        </table>
        @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
