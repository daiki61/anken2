<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';
    protected $fillable = ['user_id', 'name', 'email', 'password'];
    protected $guarded = array('id');
    public static $rules = array(
        'member_id' => 'required',
        'members' => 'required',
    );
    public function getMember(){
        return 'ID'.$this->id . ':' . $this->members;  
      }
}
