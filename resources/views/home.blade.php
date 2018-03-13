@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="<?php echo asset('css/customcss.css')?>" type="text/css"> 
    <div class="container" style="height: 100%; padding-top: 200px;">
        <div class="container-content">
            @if(Auth::check())
                @if(isset($uploadresult))
                    <h1 style="color: green; font-weight: bold; font-size: 50px;">{{$uploadresult}}</h1>
                @else 
                    @if(isset($result))
                        <h1 style="color: green; font-weight: bold; font-size: 50px;">{{$result}}</h1>
                    @endif
                    @if(isset($errorResult))
                        <h1 style="color: red; font-weight: bold; font-size: 50px;">{{$errorResult}}</h1>
                    @endif
                    <h1>{{Auth::user()->name}} current competence profile consists of:</h1>
                    @if(isset($userCompetencies))
                        @foreach($userCompetencies as $competence)
                            <h1 class="card-title">{{$competence->username}}</h1>
                            <h4 class="card-title">{{$competence->competence}}</h4>
                            <h4 class="card-title">{{$competence->yearsOfExperience}} years experience</h4>
                        @endforeach
                    @endif
                    <br>
                    <hr>  
                    <br>     
                    <form action="uploadCompetenceProfile" method="get">
                        <div>
                            <strong><p> Select a competence</p></strong>
                            <input type="radio" name="comp" value="Korvgrillning">Korvgrillnig<br>
                            <input type="radio" name="comp" value="Karuselldrift">Karuselldrift<br>
                            <input type="radio" name="comp" value="Cirkusdeltagande">Cirkusdeltagande<br>
                            <input type="radio" name="comp" value="Barnarov">Barnarov<br>

                            <br>
                            <label for="say"><strong>How many years of experience do you have?</strong></label>
                            <input name = "yearsOfExp" type="text" style ="width: 400px;padding: 12px 20px;margin: 8px 0;box-sizing: border-box;">
                            <br>
                            <label for="say"><strong>Please provide a small description of your competencies<strong></label>
                            <input name = "compDesc" type="text" style="height: 100px;width: 400px;margin: 8px 0;">
                            <br>
                            <br>
                        </div>
                        <div>
                            <button name="action" value="add" style="padding: 12px 25px; font-weight: bold; border: none;background:#1E90FF;color:white;border-radius: 10px;">Add Competence</button>
                            <button name="action" value="delete" style="padding: 12px 25px; font-weight: bold; border: none;background:red;color:white;border-radius: 10px;">Discard Application</button>
                            <br>
                            <br>
                            <p>When uploading your application, please specify dates between which you are available</p>
                            <br>
                            I am available from <input name="from" type="date"> to <input name="to" type="date">
                            <br>
                            <br>
                            <button name="action" value="upload" style="padding: 12px 25px; font-weight: bold; border: none;background:#5DD39E;color:white;border-radius: 10px;">Upload Application</button>
                        </div>
                    </form>               
                @endif

                @if(Auth::guest())
                    <p style="font-size: 50px;">You must log in to see the content!</p>
                @endif 
            @endif 
        </div>  
    </div>
@endsection
