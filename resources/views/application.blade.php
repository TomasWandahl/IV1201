@extends('layouts.app')

@section('content')
<div class="container">
@if(isset($userCompetencies))
<h1> Selected competencies for {{$applicantName}} </h1>
  @foreach($userCompetencies as $competence)
    <br>
    <h4>{{$competence->competence}}</h4>
    <h4>{{$competence->competenceDesc}}</h4>
    <h4>{{$competence->yearsOfExperience}} years experience</h4>
    <br>

  @endforeach
  @endif
</div>
@endsection