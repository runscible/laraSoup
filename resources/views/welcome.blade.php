<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {!! Html::script('assets/js/jquery-3.2.1.min.js') !!}
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        {!! Html::style('assets/css/bootstrap.css') !!}
        <link rel="stylesheet" href="{{URL::asset('css/styles.css')}}">
        <script type="text/javascript" src="{{URL::asset('js/script.js')}}"></script>
        
        <title>soup</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    </head>
    <body>
    <div class="container"> 
        <div class="row">
        <div class="col-md-6">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="text" id="input_soup">
        <br>
        
        <button id="send" type"button" class="btn btn-primary">send</button>
        </div>
        <div class="col-md-6"  id="marc_"></div>            
        </div>
        <br>
        <span>coincidencias encontradas </span>
        <span id="result"></span>
        <br>
        <div class="jumbotron col-md-8" id="found_"></div>
        </div>
        <h1>
       
       </h1>  
    </body>
</html>
