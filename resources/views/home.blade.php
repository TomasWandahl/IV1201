@extends('layouts.app')

@section('content')
<div class="container">
  <div class="container-content">
  @if(Auth::check())
  <form action="upload" method="get">
        <div>
          <label for="say">What greeting do you want to say?</label>
          <input name = "message" value="This is my message">
        </div>
        <div>
          <button>Send my greetings</button>
        </div>
      </form>



        <h1>You are now logged in</h1>
        <p>Later on, there will be a form to apply to a job here!</p>                
    @endif

    @if(Auth::guest())
        <p style="font-size: 50px;">You must log in to see the content!</p>
    @endif  
  </div>  
</div>
@endsection
