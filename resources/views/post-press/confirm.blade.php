@extends('layouts.app')
@section('title', 'Page Title')

@section('assets')

@endsection

@section('sidebar')
@endsection

@section('content')

<div id="confirm-record">
    <div class="form-group col-md-12 text-center">
       <h3>Confirm Form</h3>
       {{$request}}
    </div>
    <hr/>
    <div class="form-group col-md-12 main">
    <form method="post" action="{{route('saveRecord')}}" id="save-form" >
        {{csrf_field()}}
      <div class="container">
          <div class="form-row">
              <div class="form-group col-md-4">
                {{Form::label('machine-type', 'Machine Type')}}
                {!! Form::select('machine_id', $machines, null, ['class' => 'form-control']) !!}
              </div>
              <div class="form-group col-md-4">
                {{Form::label('day-night', 'Day Shift / Night Shift')}}
                <select id="day-night" name="day_night" class="form-control" onchange="chooseShift()">
                   <option value="">Choose--</option>
                   <option value="day">Day Shift</option>
                   <option value ="night">Night Shift</option>
                </select>
              </div>
          </div>
       </div>
        <hr>
    {{ Form::close() }}
    </div>
</div>
<br><br>

@endsection

@section('js')
<script type="text/javascript">

</script>
@endsection
