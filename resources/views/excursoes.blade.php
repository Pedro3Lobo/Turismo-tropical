<!DOCTYPE html>
<html>
<title>ParadiseTravel</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="img/ico" href="{{ URL::to('img/logo.jpg')}}">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <img src="{{ URL::to('/img/logo.jpg')}}" style="width:45%;" class="w3-round"><br><br>
    <h4><b>ParadiseTravel</b></h4>
    
  </div>
 <div class="w3-bar-block">
  <a href="{{route('welcome')}}" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-home fa-fw w3-margin-right"></i>Inicio</a> 
  <a href="{{route('levadas')}}" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-arrow-circle-right fa-fw w3-margin-right"></i>Levadas</a>
  <a href="{{route('excursoes')}}" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-arrow-circle-right fa-fw w3-margin-right"></i>Excursoes</a>
  <a href="{{route('reserva')}}" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-arrow-circle-right fa-fw w3-margin-right"></i>Reservas</a>
  <a href="{{route('transfer')}}" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-arrow-circle-right fa-fw w3-margin-right"></i>Transfers</a>
  
  </div>
  <div class="w3-panel w3-large">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-whatsapp w3-hover-opacity"></i>
    <i class="fa fa-tripadvisor w3-hover-opacity"></i>
    <i class="fa fa-google w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">
  <header id="portfolio">
    
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <h1><b>ParadiseTravel</b></h1>
   <h3><b>Excursões</b></h3>
    <div class="w3-section w3-bottombar w3-padding-16">
    </div>
    </div>
  </header>
  
  
  
  <!-- First Photo Grid-->
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div role="tabpanel" class="tab-pane active" id="home">
    <div class="w3-row-padding">

      @foreach($excursoe as $excursoes)
        <?php $vol=0; ?>
        <div class="w3-third w3-container w3-margin-bottom ">

         @foreach($excu_levada as $excu_levadas)
              @if($excursoes->id == $excu_levadas->id_excursoe)
                  @foreach($levada as $levadas)
                    @foreach($foto as $fotos)
                    
                      @if( ($fotos->id_levada == $levadas->id)&&($vol!=1))
                      <?php $vol=1; ?>
                        <img src="{{ URL::to($fotos->name) }}" alt="{{$fotos->name}}" style="width:100%" class="w3-hover-opacity ">
                      @endif
                    @endforeach
                  @endforeach
              @endif
        @endforeach
          <div class="w3-container w3-white">
          <br>
          <?php
            list($part1, $part2) = explode(':', $excursoes->hora_saida);
            $part0="".$part1."H ".$part2."min";
            list($part01, $part02) = explode(':', $excursoes->hora_saida);
            $part00="".$part01."H ".$part02."min";
          ?>
          <p><b>Nome:</b>{{ $excursoes->name}}</p>
          <p><b>Hora de Saida:</b> {{$part0}} | <b>Hora de Entrada:</b>  {{$part00}}</p>
          <p><b>Levadas:</b>
                @foreach($excu_levada as $excu_levadas)
                  @if($excursoes->id == $excu_levadas->id_excursoe)
                      @foreach($levada as $levadas)
                          @if( $levadas->id == $excu_levadas->id_levada)
                            {{$levadas->name}}  
                          @endif
                      @endforeach
                  @endif
                @endforeach
              </p>
              <p><b>Descrição:</b></p>
          <p><?php echo substr( $excursoes->descricao,0,250); ?> <b>...</b></p>
          <a type="button" class="btn btn-primary" style="margin-right:6px" href="{{route('excursões_info', ['id' => $levadas->id])}}" >Ver Mais</a>
          <hr>
          </div>
        </div>
      @endforeach

    
   
          </div>
        </div>
      </div>
    
    @foreach($sobre as $sobres)
    
    <div class="w3-container w3-padding-large" style="margin-bottom:32px">

      <div class="row" id="about">
        <div class="col-md-2">
          <img src="{{ URL::to('img/logo.jpg')}}" alt="Me" style="width:90%">
        </div>
        <div class="col-md-8">
          <h4><b>Sobre:</b></h4>
          <p>{{$sobres->descricao}}</p>
        </div>
      </div>
      
        
      
    <hr>
    
     
    
    <!-- Contact Section -->
    
    <div class="w3-container w3-padding-large w3-grey">
    <h4 id="contact"><b>Contate-nos</b></h4>
    <div class="w3-row-padding w3-center w3-padding-24" style="margin:0 -16px">
      <div class="w3-third w3-dark-grey">
      <p><i class="fa fa-envelope w3-xxlarge w3-text-light-grey"></i></p>
      <p>{{$sobres->email}}</p>
      </div>
      <div class="w3-third w3-teal">
      <p><i class="fa fa-map-marker w3-xxlarge w3-text-light-grey"></i></p>
      <p>{{$sobres->sitio}}</p>
      </div>
      <div class="w3-third w3-dark-grey">
      <p><i class="fa fa-phone w3-xxlarge w3-text-light-grey"></i></p>
      <p>{{$sobres->tel}}</p>
      </div>
    </div>
    <hr class="w3-opacity">
    <form action="{{route('email')}}" method="POST">
      <div class="w3-section">
      <label>Nome</label>
      <input class="w3-input w3-border" type="text" name="Name" required>
      </div>
      <div class="w3-section">
      <label>Email</label>
      <input class="w3-input w3-border" type="text" name="Email" required>
      </div>
      <div class="w3-section">
      <label>Mensagem</label>
      <input class="w3-input w3-border" type="text" name="Message" required>
      </div>
      <input type="hidden" name="_token"  value="{{ csrf_token() }}" >
      <button type="submit" class="w3-button w3-black w3-margin-bottom"><i class="fa fa-paper-plane w3-margin-right"></i>Submeter</button>
    </form>
    </div>

    <!-- Footer -->
    <footer class="w3-container w3-padding-32 w3-dark-grey">
    <div class="w3-row-padding">
    @endforeach

    </div>
    </footer>
  

<!-- End page content -->
</div>
</div>
</div>
<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</script>
