<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="icon" type="img/ico" href="{{ URL::to('img/logo.jpg')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Paradise Turismo</title>

    <!-- Styles -->
    
    <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-2.2.4/dt-1.10.15/datatables.min.css"/>-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/>

    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    
    <link rel="stylesheet" href="{{ URL::to('css/main.css')}}">
    <link rel="stylesheet" href="{{ URL::to('font-awesome-4.7.0/css/font-awesome.min.css')}}">

    <!-- Latest compiled and minified JavaScript -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-2.2.4/dt-1.10.15/datatables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ URL::to('dist/bootstrap-clockpicker.min.css')}}">
    <script type="text/javascript" src="{{ URL::to('dist/bootstrap-clockpicker.min.js')}}"></script>

    <!-- multiselect thing -->
   
   
    
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
    
    <!-- multiselect thing -->


    <!-- datatable thing -->
   
     <!--<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>-->
   
   
   
   
    
    <!-- multiselect thing -->
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">
          <span class="logo-mini"><font size="6"><p> <img src="{{ URL::to('img/logo.jpg')}}" style="width:4%;"> Paradise Turismo &nbsp;&nbsp;</p></font></span>
        </a>
      </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if(Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            @else
                                  <li>
                                     <a href="{{ route('login') }}" class="dropdown-toggle"  role="button" aria-expanded="false">
                                       Menu
                                     </a>
                                  </li>
                                  <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                          {{ Auth::user()->name }} <span class="caret"></span>
                                      </a>

                                      <ul class="dropdown-menu" role="menu">
                                          <li>
                                              <a href="#"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                   <i class="fa fa-power-off" aria-hidden="true"></i> Logout
                                              </a>
                                              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                  {{ csrf_field() }}
                                              </form>
                                          </li>
                                      </ul>
                                  </li>
                            @endif
                        </a>
         </div>
       </div>
     </nav>
        @yield('content')
    </div>

    <!-- Scripts -->

    <script>
    
  
    $(document).ready(function() {
    $('#example').DataTable( {
        "language": {
            "lengthMenu": "Mostrar _MENU_ registos por página",
            "zeroRecords": "Nada encontrado - sorry",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registo acessível",
            "infoFiltered": "(Filtrado apartir _MAX_ total de registo)",
            "search": "Procurar"
        }
    } );
} );


$(document).ready(function(){
       $('#le_ex').multiselect({
        nonSelectedText: 'Escolha a Levada:',
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        buttonWidth:'400px'
       });
    });
$(document).ready(function(){
       $('#le_ex2').multiselect({
        nonSelectedText: 'Escolha a Levada:',
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        buttonWidth:'400px'
       });
    });
$('.clockpicker').clockpicker({
    placement: 'top',
    align: 'left',
    donetext: 'Done'
});

  </script>
</body>
</html>

