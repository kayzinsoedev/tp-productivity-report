@extends('layouts.app')
@section('title', 'Page Title')

@section('assets')

@endsection

@section('sidebar')
@endsection

@section('content')
<div class="form-group col-md-12 text-center">
   <h3>Postpress Daily Productivity</h3>
</div>
<hr/>
<div class="form-group col-md-12 main">
{{ Form::open(array('url' => '')) }}
  <div class="container">
      <div class="form-row">
          <div class="form-group col-md-4">
            {{Form::label('machine-type', 'Machine Type')}}
            {!! Form::select('machine_id', $machines, null, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group col-md-4">
            {{Form::label('day-night', 'Day Shift / Night Shift')}}
            <select id="day-night" name="form_select" class="form-control" onchange="chooseShift()">
               <option value="">Choose--</option>
               <option value="day">Day Shift</option>
               <option value ="night">Night Shift</option>
            </select>
          </div>
      </div>
   </div>
    <hr>
      <div class="container" id="day-shift" style="display:none;">
          <div class="form-group col-md-12 text-center"><h4>Day Shift Record</h4></div>
          <div class="form-group row col-md-12">
              <!-- {{Form::label('running_hour', 'Running Hour',['class' => 'col-sm-2 col-form-label'])}} -->
              <div class="col-sm-2">
                <input type="text" class="form-control" id="running-hour" name="day_running_hour" placeholder="Running Hour">
              </div>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="actual-output" name="day_actual_output" placeholder="Actual Output">
              </div>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="actual-mr" name="day_actual_mr" placeholder="Actual M/R No">
              </div>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="mr" name="day_mr" placeholder=" M/R (Hrs)">
              </div>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="ave-mr" name="day_ave_mr" placeholder="AVE MR Hr(s)">
              </div>
          </div>
      </div>

      <div class="container" id="night-shift" style="display:none;">
          <div class="form-group col-md-12 text-center"><h4>Night Shift Record</h4></div>
          <div class="form-group row col-md-12">
            <div class="col-sm-2">
              <input type="text" class="form-control" id="running-hour" name="night_running_hour" placeholder="Running Hour">
            </div>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="actual-output" name="night_actual_output" placeholder="Actual Output">
            </div>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="actual-mr" name="night_actual_mr" placeholder="Actual M/R No">
            </div>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="mr" name="night_mr" name="night_mr" placeholder=" M/R (Hrs)">
            </div>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="ave-mr" name="ave_mr" placeholder="AVE MR Hr(s)">
            </div>
          </div>
      </div>
      <!-- <div id="downtime-div" class="container" style="display:none;">
        <div class="form-group row col-md-12">
            <div class="col-sm-4">
              <input type="checkbox" name="dt-hr" id="downtimeChk" class="chkDowntime" onclick="myFunction()"> D /T (Hrs)<br>
            </div>
        </div>
      </div> -->

      <!-- down time content -->
      <div class="container day-downtime" id="day-downtime" style="display:none;">
         Down Time
          <div class="form-group row col-md-12">
            <div class="col-sm-2">
              <input type="text" name="day_off" class="form-control" id="day-off" placeholder="Off">
            </div>
            <div class="col-sm-2">
              <input type="text" name="day_eng" class="form-control" id="day-eng" placeholder="Eng">
            </div>
            <div class="col-sm-1">
              <input type="text" name="day_cs" class="form-control" id="day-cs" placeholder="CS">
            </div>
            <div class="col-sm-2">
              <input type="text" name="day_bin" class="form-control" id="day-bin" placeholder="Bin">
            </div>
            <div class="col-sm-2">
              <input type="text" name="day_sch" class="form-control" id="day-sch" placeholder="Sch">
            </div>
            <div class="col-sm-1">
              <input type="text" name="day_cli" class="form-control" id="day-cli" placeholder="Cli">
            </div>
            <div class="col-sm-2">
              <input type="text" name="day_no_job" class="form-control" id="day-no-job" placeholder="No Job">
            </div>
          </div>
      </div>


      <div class="container" id="night-downtime" style="display:none;">
        Down Time
          <div class="form-group row col-md-12">
              <div class="col-sm-2">
                <input type="text" name="night_off" class="form-control" id="night-off" placeholder="Off">
              </div>
              <div class="col-sm-2">
                <input type="text" name="night_eng" class="form-control" id="night-eng" placeholder="Eng">
              </div>
              <div class="col-sm-1">
                <input type="text" name="night_cs" class="form-control" id="night-cs" placeholder="CS">
              </div>
              <div class="col-sm-2">
                <input type="text" name="night_bin" class="form-control" id="night-bin" placeholder="Bin">
              </div>
              <div class="col-sm-2">
                <input type="text" name="night_sch" class="form-control" id="night-sch" placeholder="Sch">
              </div>
              <div class="col-sm-1">
                <input type="text" name="night_cli" class="form-control" id="night-cli" placeholder="Cli">
              </div>
              <div class="col-sm-2">
                <input type="text" name="night_no_job" class="form-control" id="night-no-job" placeholder="No Job">
              </div>
          </div>
      </div>

      <div class="row container">
        <!-- <div class="form-group row col-md-12"> -->
          <div class="col-md-6"><button type="submit" class="btn btn-info">Save Record for {{ date("d M Y", strtotime("-1 days")) }}</button></div>
          <div class="col-md-5"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#generateReport" value="">Generate Report</button></div>
        <!-- </div> -->
      </div>

      <div class="modal fade" id="generateReport" tabindex="-1" role="dialog" aria-labelledby="">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="">Generate Report</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <form>
                          <div class="form-group row">
                            <label for="from" class="col-sm-2 col-form-label">From</label>
                            <div class='col-sm-10 input-group date' id='datetimepicker1'>
                                <input type='text' class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="to" class="col-sm-2 col-form-label">To</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputPassword" placeholder="">
                            </div>
                          </div>
                     </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button"
                       class="btn btn-primary"
                       data-dismiss="modal">Close</button>
                    <!-- <span class="pull-right">
                      <button type="button" class="btn btn-primary">
                        Add to Favorites
                      </button>
                    </span> -->
                  </div>
            </div>
          </div>
      </div>
{{ Form::close() }}
</div>
@endsection

@section('js')
<script type="text/javascript">
  // $('#datetimepicker1').datetimepicker();
  function chooseShift(){
      var e = document.getElementById("day-night");
      var selectedValue = e.options[e.selectedIndex].value;
      if(selectedValue == "day"){
          document.getElementById('day-shift').style.display = "block";
          document.getElementById('night-shift').style.display = "none";
          // document.getElementById('downtime-div').style.display = "block";
          document.getElementById('day-downtime').style.display = "block";
          document.getElementById('night-downtime').style.display = "none";
      }
      if(selectedValue == "night"){
          document.getElementById('night-shift').style.display = "block";
          document.getElementById('day-shift').style.display = "none";
          // document.getElementById('downtime-div').style.display = "block";
          document.getElementById('day-downtime').style.display = "none";
          document.getElementById('night-downtime').style.display = "block";
      }
  }

  function myFunction(){
      var checkBox = document.getElementById("downtimeChk");
      if (checkBox.checked == true){
        var e = document.getElementById("day-night");
        var selectedValue = e.options[e.selectedIndex].value;
        if(selectedValue == "day"){
            document.getElementById('day-downtime').style.display = "block";
        }
        if(selectedValue == "night"){
            document.getElementById('night-downtime').style.display = "block";
        }
      }else{
        document.getElementById('day-downtime').style.display = "none";
        document.getElementById('night-downtime').style.display = "none";
      }
  }


// $('.downtime-div').click(function() {
//   alert("chk");
//     if ($(this).prop('checked')) {
//         var e = document.getElementById("day-night");
//         var selectedValue = e.options[e.selectedIndex].value;
//         if(selectedValue == "day"){
//             $(this).parents('.main').find('.day-downtime').fadeIn('slow');
//         }
//         if(selectedValue == "night"){
//             $(this).parents('.main').find('.night-downtime').fadeIn('slow');
//         }
//     } else{
//         if(selectedValue == "day"){
//             $(this).parents('.main').find('.day-downtime').fadeOut('slow');
//         }
//         if(selectedValue == "night"){
//             $(this).parents('.main').find('.night-downtime').fadeIn('slow');
//         }
//     }
// });


</script>
@endsection
