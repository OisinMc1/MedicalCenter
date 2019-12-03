@extends('layouts.app')


@section('content')
<div class="container">
  <div class ="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Doctors
          {{-- <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary float-right">Add</a> --}}
        </div>
        <div class="card-body">
          @if (count($patients) === 0 )
          <p> There are no Patients</p>
          @else
          <table id="table-doctors" class="table table-hover">
            <thead>
              <th>Name</th>
              <th>Address</th>
              <th>Phone</th>
              <th>Date Started</th>

            </thead>
            <tbody>
              @foreach ($patients as $patient)
              <tr data-id="{{ $patient->id }}">
                <td>{{ $patient->user->name }}</td>
                <td>{{ $patient->address }}</td>
                <td>{{ $patient->phone }}</td>
                <td>{{ $patient->date_started }}</td>
                <td>
                  <a href="{{ route('admin.doctors.show',$patient->id) }}" class="btn btn-default">View</a>
                  <a href="{{ route('admin.doctors.edit',$patient->id) }}" class="btn btn-warning">Edit</a>
                  <form style="display:inline-block" method="POST" action="{{route('admin.doctors.destroy', $patient->id) }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="form-control btn btn-danger">Delete</a>
                  </form>
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
