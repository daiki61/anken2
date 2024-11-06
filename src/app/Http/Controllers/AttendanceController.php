<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceController extends Controller
{


    public function index()
    {
        $attendances = Attendance::orderBy('created_at', 'desc');
        
        return view('index', ['attendances' => $attendances]);
    }

     public function store(Request $request)
    {
        $member_id = $request->input('member_id'); 
      
        $attendances = Attendance::create([
        'member_id' => $member_id,
        'shift_in' => Carbon::now(), 
        ]);
        return redirect()->back()->with('message', '出勤時間を記録しました');
       
    }


    public function clockIn(Request $request)
    {
        // $memberId = Auth::user()->member_id; 
      
        Attendance::create([
        'member_id' => 2,
        'name' => "daiki",
        'shift_in' => Carbon::now(), 
    ]);
        if (!Auth::check()) {
        return redirect('/login');
    }
        return redirect('login')->back()->with('message', '出勤時間を記録しました');
    }

    public function clockOut(Request $request)
    {
        $currentTime = Carbon::now();
        $attendance = Attendance::where('member_id', $request->member()->id)
        ->whereNotNull('shift_in')
        ->whereNull('shift_out')
        ->latest()
        ->first();

        if ($attendance)
        {
            $attendance->update(['shift_out' => $currentTime]);
             return redirect()->back()->with('message', '退勤時間を記録しました');
        }
        return redirect()->back()->with('error', '出勤記録がありません');
    }
  
    public function restIn(Request $request)
    {
        $currentTime = Carbon::now();
        $attendances = Attendance::where('member_id', $request->member()->id)
        ->whereNotNull('shift_in')
        ->whereNull('shift_out')
        ->latest()
        ->first();

        if ($attendances)
        {
            $attendances->update(['rest_in' => $currentTime]);
            return redirect()->back()->with('message', '休憩開始時間を記録しました');

        }
         return redirect()->back()->with('error', '出勤記録がありません');
    }
       
    public function restOut(Request $request)
    {
        $currentTime = Carbon::now();
        $attendances = Attendance::where('member_id', $request->member()->id)
        ->whereNotNull('rest_in')
        ->whereNull('rest_out')
        ->latest()
        ->first();

        if ($attendances)
        {
            $attendances->update(['rest_out' => $currentTime]);
            return redirect()->back()->with('message', '休憩終了時間を記録しました');
        }
        return redirect()->back()->with('error', '休憩開始記録がありません');


    }

}
