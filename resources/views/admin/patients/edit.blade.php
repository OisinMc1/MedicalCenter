@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Edit Patients
                </div>

                <!-- Patients Edit Form -->

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

                    <!-- Patients Edit Form -->

                    <form method="POST" action="{{route('admin.patients.update', $patient->id)}}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}">
                        <div class="form-group">
                            <label for="address"> Address </label>
                            <input type="text" class="form-control" id="address" name="address" value="{{old('address', $patient->address)}}" />
                        </div>
                        <div class="form-group">
                            <label for="phone"> Time </label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone', $patient->phone)}}" />
                        </div>
                        <div class="form-group">
                            <label for="date_started"> insurance </label>
                            <input type="select" class="form-control" id="insurance" name="insurance" value="{{old('insurance', $patient->insurance)}}" />
                        </div>
                        <a href="{{route('admin.patients.index')}}" class="btn btn-outline"> Cancel </a>
                        <button type="submit" class="btn btn-primary float-right"> Submit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
