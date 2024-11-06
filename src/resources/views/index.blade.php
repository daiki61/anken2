@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="attendance__alert">
    <h2>'name'さんお疲れ様です！</h2>
</div>


<div class="attendance__content"> 
    <div class="attendance__panel">  
        <form class="attendance__button" action="{{ route('clock-in') }}" method="POST">
            @csrf
             <input type="hidden" name="member_id" value="{{ auth()->id() }}">
            <button class="attendance__button-submit1" type="submit">勤務開始</button>
        </form>

        <form class="attendance__button" action="{{ route('clock-out') }}" method="POST">
            @csrf
            <button class="attendance__button-submit2" type="submit">勤務終了</button>
        </form>

        <form class="attendance__button" action="{{ route('rest-in') }}" method="POST">
            @csrf
            <button class="attendance__button-submit3" type="submit">休憩開始</button>
        </form> 

        <form class="attendance__button" action="{{ route('rest-out') }}" method="POST">
            @csrf
            <button class="attendance__button-submit4" type="submit">休憩終了</button>
        </form>
　　</div>
</div>

<style>
   .attendance__button-submit1{
    top: 10px;
    left: 300px;
    width: 300px;
    height: 130px;
    background: white;
    position: relative;
    
   }

   .attendance__button-submit2{
    width: 300px;
    height: 130px;
    background: white;
    position: absolute;
    left: 700px;
    top: 250px;
   }

   .attendance__button-submit3{
    width: 300px;
    height: 130px;
    background:white;
    position: absolute;
    left: 300px;
    bottom:30px;
   }

   .attendance__button-submit4{
    width: 300px;
    height: 130px;
    background: white;
    position: absolute;
    left: 700px;
    bottom: 30px;
   }

     

    .svg.w-5.h-5 {
    width: 30px;
    height: 30px;
  }
</style>


@endsection









