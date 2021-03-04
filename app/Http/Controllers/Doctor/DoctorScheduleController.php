<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DoctorSchedule;
use App\Doctor;

class DoctorScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getSchedules(Request $request)
    {
        $doctor_id = $request->get('doctor_id');
        $doctor = Doctor::where('users_id', '=', $doctor_id)->first();
        
        $schedules = DoctorSchedule::where("doctor_id", $doctor->id)->where("status", "1")->orderBy('day_week', 'ASC')->orderBy('start_time', 'asc')->get();
        return response()->json(['code'=>200,'estado'=>true,'message'=>"Data Exitoso", 'data'=>$schedules]);
    }

    public function postSchedules(Request $request)
    {
        $schedule = $request['schedule'];
        
        $doctor_id = $schedule['doctor_id'];
        $doctor = Doctor::where('users_id', '=', $doctor_id)->first();
        
        $schedule['status'] = '1';
        $schedule['doctor_id'] = $doctor->id;
        $schedulesave = DoctorSchedule::updateOrCreate(['id' => $schedule['id']], $schedule);
        return response()->json(true);
    }
    
    public function delete(Request $request)
    {
        $doctor_schedule_id = $request->get('doctor_schedule_id');
        $doctor_schedule = DoctorSchedule::where('id', '=', $doctor_schedule_id)->firstOrFail();
        $doctor_schedule->status = 0;
        $doctor_schedule->save();
        return response()->json(['code'=>200,'estado'=>true,'message'=>"Eliminacion Exitoso", 'data'=>[]]);
    }

}