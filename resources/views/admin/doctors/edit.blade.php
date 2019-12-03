@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Edit doctors
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{route('admin.doctors.update', $doctor->id)}}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}">
                        <div class="form-group">
                            <label for="address"> Address </label>
                            <input type="text" class="form-control" id="address" name="address" value="{{old('address', $doctor->address)}}" />
                        </div>
                        <div class="form-group">
                            <label for="phone"> Time </label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone', $doctor->phone)}}" />
                        </div>
                        <div class="form-group">
                            <label for="date_started"> Date Started </label>
                            <input type="date" class="form-control" id="date_started" name="date_started" value="{{old('date_started', $doctor->date_started)}}" />
                        </div>
                        <a href="{{route('admin.doctors.index')}}" class="btn btn-outline"> Cancel </a>
                        <button type="submit" class="btn btn-primary float-right"> Submit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection