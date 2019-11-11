<?php

namespace App\Http\Controllers\Postpress;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Postpress\Machine;
use App\Postpress\PostPress;
use App\Postpress\PostPressDay;
use App\Postpress\PostPressNight;
use App\Postpress\PostPressDownTimeDay;
use App\Postpress\PostPressDownTimeNight;

class PostPressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $machines = Machine::pluck('name', 'id')->prepend('Choose Machine Type..', '');;
        $dayOrNight = ["select"=>"Choose..", "day"=> "Day Shift", "night"=> "Night Shift"];

        $post_presses = PostPress::all();
        return view('post-press.index',compact('machines','dayOrNight','post_presses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SaveRecord(Request $request)
    {

        $machines = Machine::pluck('name', 'id')->prepend('Choose Machine Type..', '');;
        $dayOrNight = ["select"=>"Choose..", "day"=> "Day Shift", "night"=> "Night Shift"];

        $day_id = PostPressDay::create([
            'machine_id' => $request->machine_id,
            'day_night' => "day",
            'day_running_hour' =>$request->day_running_hour,
            'day_actual_output' =>$request->day_actual_output,
            'day_actual_mr'=>$request->day_actual_mr,
            'day_mr' =>$request->day_mr,
            'day_ave_mr' =>$request->day_ave_mr,
        ])->id;

        $night_id = PostPressNight::create([
            'machine_id' => $request->machine_id,
            'day_night' => "night",
            'night_running_hour' =>$request->night_running_hour,
            'night_actual_output' =>$request->night_actual_output,
            'night_actual_mr' =>$request->night_actual_mr,
            'night_mr' =>$request->night_mr,
            'night_ave_mr' =>$request->night_ave_mr,
            ])->id;

        $day_downtime_id = PostPressDownTimeDay::create([
            'record_id' => $day_id,
            'day_off' => $request->day_off,
            'day_eng' => $request->day_eng,
            'day_cs' => $request->day_cs,
            'day_bin' => $request->day_bin,
            'day_sch' => $request->day_sch,
            'day_cli' => $request->day_cli,
            'day_no_job' => $request->day_no_job,
        ])->id;


        $night_downtime_id = PostPressDownTimeNight::create([
            'record_id' => $night_id,
            'night_off' => $request->night_off,
            'night_eng' => $request->night_eng,
            'night_cs' => $request->night_cs,
            'night_bin' => $request->night_bin,
            'night_sch' => $request->night_sch,
            'night_cli' => $request->night_cli,
            'night_no_job' => $request->night_no_job,
        ])->id;


        Postpress::create([
          'day_id' => $day_id,
          'night_id' => $night_id,
          'day_downtime_id' => $day_downtime_id,
          'night_downtime_id' => $night_downtime_id,
          'machine_id' => $request->machine_id
        ]);

        // return redirect('/post-press')->with('status','Record Updated successfully');
        return response()->json([
            'status' => "Record Added successfully",
            'location' => redirect('/post-press')
        ], 200);

    }

    public function confirmRecord(Request $request){

      $machines = Machine::pluck('name', 'id')->prepend('Choose Machine Type..', '');;
      $dayOrNight = ["select"=>"Choose..", "day"=> "Day Shift", "night"=> "Night Shift"];
      return view('post-press.confirm',compact('machines','request','dayOrNight'));
      // $returnHTML = view('post-press.confirm',compact('machines','request','dayOrNight'))->render();
      // return response()->json([
      //     'success' => true,
      //     'html'=> $returnHTML,
      //     'location' => redirect('/post-press/confirm')
      // ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
