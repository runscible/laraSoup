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
        <div class="col-md-12">
        <span>len char</span>
        <input type="text" id="len_char">
        <br>
        <span>len row</span>
        <input type="text" id="len_row">
        <br>
        <button id="send" type"button" class="btn btn-primary">send</button>
            <br>
            <div id="marc_">
                <table>
                    <tr>
                        <th>horizontales</th>
                        <th>horizontales invertidas</th>
                        <th>verticales</th>
                        <th>verticales invertidas</th>
                        <th>diagonal superior derecha</th>
                        <th>diagonal superior izquierda</th>
                        <th>diagonal inferior derecha</th>
                        <th>diagonal inferor izquierda</th>
                    </tr>
                    <tr>
                        <td id="h_"></td>
                        <td id="h_i"></td>
                        <td id="v_"></td>
                        <td id="v_i"></td>
                        <td id="d_u_r"></td>
                        <td id="d_u_l"></td>
                        <td id="d_d_r"></td>
                        <td id="d_d_l"></td>
                    </tr>
                </table>
            </div>            
                
        </div>
        </div>
        
        <br>    
        <span>sopa generada </span>
        <span id="result"></span>
        <br>
        <div id="found_"></div>
        </div>
    </body>
</html>
