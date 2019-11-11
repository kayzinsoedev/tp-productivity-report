@extends('layouts.app')
@section('title', 'Page Title')

@section('assets')

@endsection

@section('sidebar')
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		{{--@if (session('status'))--}}
		    <div class="alert" id="alert-msg">
		    	{{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--}}
		        {{--{{ session('status') }}--}}
		    </div>
		{{--@endif--}}
	</div>
</div>

<div class = "card">
		<div class="card-body">
			  <h4 class="alert alert-dark">Choose Machine Type</h4>
				<form method="post" action="{{route('saveRecord')}}" id="save-form" >
				<!-- <form method="post" action="{{route('confirmRecord')}}" id="save-form" > -->
				    {{csrf_field()}}
				  <div class="container">
				      <div class="form-row">
				          <div class="form-group col-md-4">
				            {{Form::label('machine-type', 'Machine Type')}}
				            {!! Form::select('machine_id', $machines, null, ['class' => 'form-control']) !!}
				          </div>
				          <!-- <div class="form-group col-md-4">
				            {{Form::label('day-night', 'Day Shift / Night Shift')}}
				            <select id="day-night" name="day_night" class="form-control" onchange="chooseShift()">
				               <option value="">Choose--</option>
				               <option value="day">Day Shift</option>
				               <option value ="night">Night Shift</option>
				            </select>
				          </div> -->
				      </div>
				   </div>
				    	<h5 class="alert alert-dark">Key In Day Shift Record</h5>
				      <div class="container" id="day-shift" style="">
				          <div class="form-group col-md-12 text-center"><h4></div>
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

							<div class="container day-downtime" id="day-downtime" style="">
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

							<h5 class="alert alert-dark">Key In Night Shift Record</h5>
				      <div class="container" id="night-shift" style="">
				          <div class="form-group col-md-12 text-center"><h4></div>
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
				              <input type="text" class="form-control" id="ave-mr" name="night_ave_mr" placeholder="AVE MR Hr(s)">
				            </div>
				          </div>
				      </div>

				      <!-- down time content -->

				      <div class="container" id="night-downtime" style="">
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

				      <!-- <div class="row container"> -->
				        <!-- <div class="form-group row col-md-12"> -->
				          <!-- <button type="button" id="save-record" class="btn btn-info">Save Record for {{ date("d M Y", strtotime("-1 days")) }}</button> -->
									<!-- <button type="button" id="save-record" class="btn btn-primary btn-lg btn-block">Save Record for {{ date("d M Y", strtotime("-1 days")) }}</button> -->
				          <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#confirmRecord">Save Record for {{ date("d M Y", strtotime("-1 days")) }}</button></div>
				          {{--<div class="col-md-5"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#generateReport" value="">Generate Report</button></div>--}}
				        <!-- </div> -->
				      <!-- </div> -->


							<!-- Confirmation for Save Record -->
							<div class="modal fade" id="confirmRecord" tabindex="-1" role="dialog" aria-labelledby="">
				          <div class="modal-dialog" role="document">
										<!-- <form action=""> -->
						            <div class="modal-content">
						                  <div class="modal-header">
						                    <h4 class="modal-title" id="">Record For {{ date("d M Y", strtotime("-1 days")) }}</h4>
						                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						                        <span aria-hidden="true">&times;</span>
						                    </button>
						                  </div>
						                  <div class="modal-body">
				                          <p>Are You Sure want to confirm your record ?</p>
						                  </div>
						                  <div class="modal-footer">
																<button type="button" id="confirm" class="btn btn-primary" data-dismiss="modal">Confirm</button>
						                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
						                  </div>
						            </div>
										<!-- </form> -->
				          </div>
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
				                                <input type="text" class="form-control" data-provide="datepicker" id="from_date" data-toggle="datetimepicker" data-target="#from_date" name="from_date" value="" placeholder="DD-MM-YYYY" required>
				                            </div>
				                          </div>
				                          <div class="form-group row">
				                            <label for="to" class="col-sm-2 col-form-label">To</label>
				                             <div class='col-sm-10 input-group date' id='datetimepicker1'>
				                              <input type="text" class="form-control"  data-provide="datepicker" id="to_date" data-toggle="datetimepicker" data-target="#to_date" name="to_date" value="" placeholder="DD-MM-YYYY" required>
				                            </div>
				                          </div>
				                     </form>
				                  </div>
				                  <div class="modal-footer">
				                    <button type="button"
				                       class="btn btn-primary"
				                       data-dismiss="modal">Close</button>
				                  </div>
				            </div>
				          </div>
				      </div>
				{{ Form::close() }}
		</div>

@if(count($post_presses) >0 )
<div id="show-record" class="card col-md-12">
	<h2>List All Records For {{ date("d M Y", strtotime("-1 days")) }}</h2>
	<table class="table table-striped table-bordered table-sm" id="recordList" cellspacing="0">
	  <thead>
	    <tr>
	      <th scope="col" rowspan="2" >M/C SPEED</th>
	      <th scope="col" rowspan="2">RUNNING HOURS</th>
	      <th scope="col" rowspan="2">Machine</th>
	      <th scope="col" rowspan="2">ACTUAL OUTPUT</th>
	      <th scope="col" rowspan="2">ACTUAL M/R No's</th>
	      <th scope="col" rowspan="2">M/R (Hrs)</th>
	      <th scope="col" rowspan="2">AVE MR Hr(s)</th>
	      <th scope="col" colspan="7">D/T (Hrs)</th>
				<th scope="col" rowspan="2">TOTAL D/T (Hrs)</th>
				<th scope="col" rowspan="2">TOTAL OPERATING TIME</th>
				<th scope="col" rowspan="2">ACTUAL PRODUCTIVITY WITHOUT DOWNTIME</th>
				<th scope="col" rowspan="2">ACTUAL PRODUCTIVITY WITH DOWNTIME</th>
				<th scope="col" rowspan="2">Remark</th>
				<th scope="col" rowspan="2">Action</th>
	    </tr>
			<tr>
	      <th scope="col">Off</th>
	      <th scope="col">Eng</th>
	      <th scope="col">CS</th>
	      <th scope="col">Bin</th>
	      <th scope="col">Sch</th>
	      <th scope="col">Cli</th>
	      <th scope="col">No Job</th>
	    </tr>
	  </thead>
	  <tbody>
				@foreach($post_presses as $key=>$post_press)
				    <tr>
				      <td></td>
				      <td></td>
				      <td>{{$post_press->machine->name}}</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
				    </tr>
				    <tr>
				      <td></td>
				      <td>{{$post_press->PostPressDay->day_running_hour}}</td>
				      <td>Day Shift</td>
							<td>{{$post_press->PostPressDay->day_actual_output}}</td>
							<td>{{$post_press->PostPressDay->day_actual_mr}}</td>
							<td>{{$post_press->PostPressDay->day_mr}}</td>
							<td>{{$post_press->PostPressDay->day_ave_mr}}</td>
							<td>{{$post_press->postPressDownTimeDay->day_off}}</td>
							<td>{{$post_press->postPressDownTimeDay->day_eng}}</td>
							<td>{{$post_press->postPressDownTimeDay->day_cs}}</td>
							<td>{{$post_press->postPressDownTimeDay->day_bin}}</td>
							<td>{{$post_press->postPressDownTimeDay->day_sch}}</td>
							<td>{{$post_press->postPressDownTimeDay->day_cli}}</td>
							<td>{{$post_press->postPressDownTimeDay->day_no_job}}</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
				    </tr>
				    <tr>
							<td></td>
				      <td>{{$post_press->postPressNight->night_running_hour}}</td>
				      <td>Night Shift</td>
							<td>{{$post_press->postPressNight->night_actual_output}}</td>
							<td>{{$post_press->postPressNight->night_actual_mr}}</td>
							<td>{{$post_press->postPressNight->night_mr}}</td>
							<td>{{$post_press->postPressNight->night_ave_mr}}</td>
							<td>{{$post_press->PostPressDownTimeNight->night_off}}</td>
							<td>{{$post_press->PostPressDownTimeNight->night_eng}}</td>
							<td>{{$post_press->PostPressDownTimeNight->night_cs}}</td>
							<td>{{$post_press->PostPressDownTimeNight->night_bin}}</td>
							<td>{{$post_press->PostPressDownTimeNight->night_sch}}</td>
							<td>{{$post_press->PostPressDownTimeNight->night_cli}}</td>
							<td>{{$post_press->PostPressDownTimeNight->night_no_job}}</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
				    </tr>
				@endforeach
	  </tbody>
	</table>
</div>
<div class="col-md-5"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#generateReport" value="">Generate Report</button></div>
@endif

@endsection

@section('js')
<script type="text/javascript">
    $(function () {
			$('#recordList').DataTable({


			});
      // $('#save-record').click(function() {
      $('#confirm').click(function() {
        var form= $("#save-form");
				console.log(form.attr('action'));
            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: form.serialize(),
                success: function(data)
                {
										// $("#confirm-record").html(data.html);
                    console.log(data);
										// $("#save-record").trigger("reset");
										$("#alert-msg").fadeIn().html(data.status);
										var element = document.getElementById("alert-msg");
  									element.classList.add("alert-success");

										setTimeout(function(){
												 $('#alert-msg').fadeOut("Slow");
										}, 4000);
										setTimeout(function(){
												 location.reload();
										}, 1000);
										// window.location='post-press/confirm';
                }
            });
       });
          $('.datepicker').datepicker({
              // useCurrent: false,
              // daysOfWeekDisabled: [0, 6],
              // format: "DD-MM-YYYY"
          });
          //
          // $('#to_date').datetimepicker({
          //     useCurrent: false,
          //     daysOfWeekDisabled: [0, 6],
          //     format: "DD-MM-YYYY"
          // });
      });

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
