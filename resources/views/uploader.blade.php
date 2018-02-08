@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="<?php echo asset('css/customcss.css')?>" type="text/css"> 
<div class="container">
  <div class="container-content">
  @if(Auth::check())
  <h1>You are now logged in</h1>
  <h1>User id is: {{Auth::user()->id}}</h1>
  <h1>User name is: {{Auth::user()->name}}</h1>
  <p>Later on, there will be a form to apply to a job here, but right now all you can do is some simple math!</p>   
  <hr>       
  <form action="uploadCompetenceProfile" method="get">
        <div>
          <label for="say"><strong>How many years of experience do you have?</strong></label>
          <input name = "yearsOfExp" type="text" style ="width: 400px;padding: 12px 20px;margin: 8px 0;box-sizing: border-box;">
          <br>
          <label for="say"><strong>Please provide a small description of your competencies<strong></label>
          <input name = "compDesc" type="text" style="height: 100px;width: 400px;margin: 8px 0;">
          <br>
          <br>
          I am available from <input name="from" type="date"> to <input name="to" type="date">
          <br>
          <br>
        </div>
        <div>
          <button style="padding: 12px 25px; font-weight: bold; border: none;background:#5DD39E;color:white;border-radius: 10px;">Get result</button>
        </div>
      </form>        
    @endif

    @if(Auth::guest())
        <p style="font-size: 50px;">You must log in to see the content! hahahahwudhauwfe! Filip hälsar också!</p>
    @endif  
  </div>  
</div>
@endsection
