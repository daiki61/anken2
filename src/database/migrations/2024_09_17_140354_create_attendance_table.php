<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

if (Schema::hasTable('attendance')) {
    
    $attendanceCount = \App\Models\Attendance::count();
} else {
    return response()->json(['message' => 'Attendance table does not exist.']);
}

class CreateAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance', function (Blueprint $table) {
            $table->unsignedBigInteger('member_id');
             $table->foreignId('member_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('member_id');           
            $table->string('name');
            $table->timestamp('shift_in')->nullable();
            $table->timestamp('shift_out')->nullable();
            $table->timestamp('rest_in')->nullable();
            $table->timestamp('rest_out')->nullable();
            $table->timestamps();
            //$table->timestamps('created_at')->nullable();
           // $table->timestamps('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance');
    }
}
