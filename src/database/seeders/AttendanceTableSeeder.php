<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AttendanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'member_id' => 1,
                'name' => 'ken',
                'shift_in' => Carbon::create(2024, 10, 1, 9, 0, 0),  
                'shift_out' => Carbon::create(2024, 10, 1, 17, 0, 0), 
                'rest_in' => Carbon::create(2024, 10, 1, 12, 0, 0),   
                'rest_out' => Carbon::create(2024, 10, 1, 13, 0, 0),  
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        ];
        DB::table('attendance')->insert($param);
    }
}
