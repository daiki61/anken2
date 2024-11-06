<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table = 'attendance'; 

    protected $fillable = ['member_id', 'shift_in', 'shift_out', 'rest_in', 'rest_out'];
    protected $guarded = array('id');
    public static $rules = array(
        'member_id' => 'required',
        'attndance' => 'required',
    );

    public function getAttendance(){
        return 'ID'.$this->id . ':' . $this->attendance;  
      }

    
}
