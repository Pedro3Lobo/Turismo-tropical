<!DOCTYPE html>
<html>
 <title>ParadiseTravel</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" type="img/ico" href="{{ URL::to('img/logo.jpg')}}">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Arial", sans-serif}
</style>
<body >
    <div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>Logo</a>
  <a href="{{route('levadas')}}" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Levadas</a>
  <a href="{{route('excursoes')}}" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Excursões</a>
  <a href="{{route('transfer')}}" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Transfers</a>
  <a href="{{route('reserva')}}" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Reservas</a>
 
  </div>
 
 </div>
 </div>
 

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
    <a href="{{route('levadas')}}" class="w3-bar-item w3-button">Levadas</a>
    <a href="{{route('excursoes')}}" class="w3-bar-item w3-button">Excursões</a>
    <a href="{{route('transfer')}}" class="w3-bar-item w3-button">Transfers</a>
    <a href="{{route('reserva')}}" class="w3-bar-item w3-button">Reservas</a>
    
  </div>
</div>

<!-- Image Header -->
<div class="w3-display-container w3-animate-opacity">
  <img src="{{ URL::to('img/index.jpg') }}" alt="boat" style="width:100%;min-height:350px;max-height:600px;">
  <div class="w3-container w3-display-bottomleft w3-margin-bottom">  
    <img src="img/logo_1.jpg" style="width:30%"> 
  </div>
</div>








<!-- Footer -->
<footer class="w3-container w3-padding-32 w3-theme-d1 w3-center">
  <h4>Siga-nos</h4>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Facebook"><i class="fa fa-facebook"></i></a>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Twitter"><i class="fa fa-twitter"></i></a>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Google +"><i class="fa fa-google-plus"></i></a>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Google +"><i class="fa fa-instagram"></i></a>
  <a class="w3-button w3-large w3-teal w3-hide-small" href="javascript:void(0)" title="Linkedin"><i class="fa fa-linkedin"></i></a>
  <p>Paradise Travel</a></p>

</footer>

<script>
// Script for side navigation
function w3_open() {
    var x = document.getElementById("mySidebar");
    x.style.width = "300px";
    x.style.paddingTop = "10%";
    x.style.display = "block";
}

// Close side navigation
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</body>
</html>
