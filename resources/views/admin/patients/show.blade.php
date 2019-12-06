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
              <td>{{ $patient->user->name }}</td>
            </tr>
              <tr>
              <th>Address</th>
              <td>{{ $patient->address }}</td>
            </tr>
            <tr>
              <th>Phone</th>
              <td>{{ $patient->phone }}</td>
            </tr>
            <tr>
              <th>insurance</th>
              <td>{{ $patient->insurance }}</td>
            </tr>
            <tr>
            </tbody>
        </table>
        <a href="{{ route('admin.patients.index') }}" class="btn btn-default">Back</a>
        <a href="{{ route('admin.patients.edit',$patient->id) }}" class="btn btn-warning">Edit</a>
        <form style="display:inline-block" method="POST" action="{{route('admin.patients.destroy', $patient->id) }}">
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
