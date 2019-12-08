@extends('layouts.app')

<!-- Admin Home Page -->

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as an Admin!

                    <!-- Links to Tables Pages -->

                    <br>
                    Welcome to the Medical Center! <a href="{{ route('admin.visits.index') }}">Visits</a>
                    Welcome to the Medical Center! <a href="{{ route('admin.doctors.index') }}">Doctors</a>
                    Welcome to the Medical Center! <a href="{{ route('admin.patients.index') }}">Patients</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
