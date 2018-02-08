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
  <form action="add" method="get">
        <div>
          <label for="say"><strong>Please provide an integer!</strong></label>
          <input name = "x" type="text" style ="width: 400px;padding: 12px 20px;margin: 8px 0;box-sizing: border-box;">
          <br>
          <label for="say"><strong>Please provide another integer (or same)!<strong></label>
          <input name = "y" type="text" style="height: 100px;width: 400px;margin: 8px 0;">
          <br>
          <br>
          
        </div>
        <div>
          <button style="padding: 12px 25px; font-weight: bold; border: none;background:#5DD39E;color:white;border-radius: 10px;">Get result</button>
        </div>
      </form>        
    @endif

    @if(Auth::guest())
        <p style="font-size: 50px;">You must log in to see the content!</p>
    @endif  
  </div>  
</div>
@endsection
