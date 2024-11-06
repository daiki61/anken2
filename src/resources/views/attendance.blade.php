@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css')  }}">
@endsection

@section('content')

<div class="attendance__alert">
    <h2>
    @if(isset($userData))
    <p>ようこそ、{{ $userData->name }}さん</p>
    @endif
    </h2>
</div>


<div class="attendance-table">
    <table class="attendance-table__inner">
        <tr class="attendance-table__row">
            <th class="attendance-table__header">名前</th>
            <th class="attendance-table__header">勤務開始</th>
            <th class="attendance-table__header">勤務終了</th>
            <th class="attendance-table__header">休憩時間</th>
            <th class="attendance-table__header">勤務時間</th>
        </tr>
        
        @foreach ($attendances as $attendance)
        <tr class="attendance-table__row">
            <td class="attendance-table__item">{{ $attendance->name }}</td>
            <td class="attendance-table__item">{{ $attendance->shift_in }}</td>
            <td class="attendance-table__item">{{ $attendance->shift_out }}</td>
            <td class="attendance-table__item">{{ $attendance->rest_in }}</td>
            <td class="attendance-table__item">{{ $attendance->rest_out }}</td>     
        </tr>
        @endforeach
    </table>
<div class="pagination">
    {{ $attendances->links() }}

</div>
@endsection









<?php
// データベース接続
$conn = new mysqli($mysql, $laravel_user, $root, $laravel_db);

// SQLクエリ
$sql = "SELECT 
        TIMESTAMPDIFF(MINUTE, shiftstarted, shiftended) AS total_work_time_minutes,
        TIMESTAMPDIFF(MINUTE, rest_in, rest_out) AS total_break_time_minutes,
        FROM attendance_table";

// クエリの実行
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 結果を表示
    while($row = $result->fetch_assoc()) {
        echo "勤務時間: " . $row["total_work_time_minutes"] . " 分";
        echo "休憩時間: " . $row["total_break_time_minutes"] . " 分";
        
    }
} else {
    echo "データなし";
}
$conn->close();
?>


 
        