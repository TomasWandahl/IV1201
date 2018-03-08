@extends('layouts.app')

@section('content')
<div class="container">
    @if(isset($notification))
        <h1>{{$notification}}</h1>
        <br>
    @endif
    <form action="searchForApplication" method="get">
        <div>
            <label for="say"><strong>Search for name</strong></label>
            <input name = "name" type="text" style ="width: 400px;padding: 12px 20px;margin: 8px 0;box-sizing: border-box;">&nbsp&nbsp<button name="action" value="name" style="padding: 12px 25px; font-weight: bold; border: none;background:#5DD39E;color:white;border-radius: 10px;">Search for name</button>
            <br>
            <label for="say"><strong>Search for competence<strong></label>
            <input name = "competence" type="text" style="width: 400px;padding: 12px 20px;margin: 8px 0;box-sizing: border-box;">&nbsp&nbsp<button name="action" value="competence" style="padding: 12px 25px; font-weight: bold; border: none;background:#5DD39E;color:white;border-radius: 10px;">Search via competence</button>
            <br>
            <br>
            <p>Search availability  
            <input type="radio" name="dateAction" value="From"> from </input>
            <input type="radio" name="dateAction" value="To"> to</input>
            date:
            <input name="date" type="date">&nbsp&nbsp<button name="action" value="date" style="padding: 12px 25px; font-weight: bold; border: none;background:#5DD39E;color:white;border-radius: 10px;">Search via date</button>
            </p>
            <br>
            <br>
        </div>
    </form>         
</div>
@endsection