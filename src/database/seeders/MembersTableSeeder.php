<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
          'name' => 'tony',
          'email' => 'user1@example.com',
          'password' => 'password123',
        ];    
        DB::table('members')->insert($param);

        $param = [
          'name' => 'jack',
          'email' => 'user2@example.com',
          'password' => 'samplepassword',
        ];
        DB::table('members')->insert($param);

        $param = [
          'name' => 'sara',
          'email' => 'user3@example.com',
          'password' => 'Test@1234',
        ];
        DB::table('members')->insert($param);

        $param = [
          'name' => 'saly',
          'email' => 'sample@example.com',
          'password' => 'SecurePass!2024',
        ];
        DB::table('members')->insert($param);






    }
        
    
}
