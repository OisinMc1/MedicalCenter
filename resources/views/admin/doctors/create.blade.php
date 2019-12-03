@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Add new visits
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
            <form method = "POST" action = "{{route('admin.patients.store')}}">
              <input type ="hidden" name="_token" value="{{ csrf_token()}}">
              <div class="form-group">
                <label for ="date"> Date </label>
                <input type ="date" class="form-control" id="date" name="date" value="{{old('date')}}"/>
              </div>
              <div class="form-group">
                <label for ="time"> Time </label>
                <input type ="time" class="form-control" id="time" name="time" value="{{old('time')}}"/>
              </div>
              <div class="form-group">
                <label for ="title"> Cost of Visit </label>
                <input type ="text" class="form-control" id="cost_of_visit" name="cost_of_visit" value="{{old('cost_of_visit')}}"/>
              </div>
              <a href="{{route('admin.visits.index')}}" class="btn btn-outline"> Cancel </a>
              <button type="submit" class="btn btn-primary float-right"> Submit </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
