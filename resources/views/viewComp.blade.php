@extends('layouts.app')

@section('content')
<div class="container">
@if(isset($applications))
@foreach($applications as $application)
<div class="card" style="width: 18rem;border:2px solid black;padding:20px;">
  <a href="viewApplication?id={{$application->userid}}" style="text-decoration: none; color:black;">
  <div class="card-body">
    <h1 class="card-title">{{$application->username}}</h1>
    <p class="card-text">From <strong>{{ $application->availableFrom }} </strong> to <strong>{{$application -> availableTo}}</strong></p>
  </div>
  </a>
</div>




  
  <br>
@endforeach

@endif
</div>
@endsection