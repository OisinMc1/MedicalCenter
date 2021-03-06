@extends('layouts.app')

<!-- Patients Home Page -->

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

                    You are logged in as a Patient!

                    <br>
                    Welcome to the Medical Center! <a href="{{ route('patient.visits.index') }}">Visits</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
