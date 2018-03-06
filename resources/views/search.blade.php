@extends('layouts.app')

@section('content')
<div class="container">
<form action="searchForApplication" method="get">
        <div>
          <label for="say"><strong>What name would you like to search?</strong></label>
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
</div>
@endsection