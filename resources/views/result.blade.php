@extends('layouts.app')

@section('content')
    @if (1 == 2)
        @if(isset($application))
        <div class="container" style="margin-top: 500px;">
        @foreach($application as $application)

        <div class="card" style="width: 18rem;border:2px solid black;padding:20px;">
        <a href="viewApplication?id={{$application->userid}}" style="text-decoration: none; color:black;">
        <div class="card-body">
        <h1 class="card-title">{{$application->username}}</h1>
        <p class="card-text">From <strong>{{ $application->availableFrom }} </strong> to <strong>{{$application -> availableTo}}</strong></p>
        </div>
        </a>
        </div>
        </div>
        @endforeach
        @else
        </div>
        @endif
    @else
        <div class="container"><h1>You must be an admin to view this page</h1></div>
    @endif
@endsection
