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
              <th>Name</th>
              <td>{{ $doctor->user->name }}</td>
            </tr>
              <tr>
              <th>Date</th>
              <td>{{ $doctor->address }}</td>
            </tr>
            <tr>
              <th>Time</th>
              <td>{{ $doctor->phone }}</td>
            </tr>
            <tr>
              <th>Cost of Visit</th>
              <td>{{ $doctor->date_started }}</td>
            </tr>
            <tr>
            </tbody>
        </table>
        <a href="{{ route('admin.visits.index') }}" class="btn btn-default">Back</a>
        <a href="{{ route('admin.visits.edit',$visit->id) }}" class="btn btn-warning">Edit</a>
        <form style="display:inline-block" method="POST" action="{{route('admin.visits.destroy', $visit->id) }}">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="form-control btn btn-danger">Delete</a>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
