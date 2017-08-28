<!doctype html>
<html lang="{{ app()->getLocale() }}">
<title>Tropical Travel</title>
<link rel='icon' href="{{ URL::to('img/logo.png')}}">
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
    <img src="{{ URL::to('img/logo.png')}}" style="width:45%;" class="w3-round"><br><br>
    <h4><b>Tropical</b></h4>
    <p class="w3-text-grey"></p>
  </div>
  <div class="w3-bar-block">
    <a href="#Inicio" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>Inicio</a> 
	<a href="#Levadas" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-blind fa-fw w3-margin-right"></i>Levadas</a>
	<a href="#Levadas" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>Reservas</a>
	<a href="#Contactos" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-phone fa-fw w3-margin-right"></i>Contactos</a>
	<a href="#Sobre Nós" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>Sobre Nós</a>

  </div>

</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Header -->
  <header id="portfolio">
    <a href="#"><img src="{{ URL::to('avatar_g2.jpg')}}" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <h1><b>TropicalTravel</b></h1>
    <div class="w3-section w3-bottombar w3-padding-16">
      <span class="w3-margin-right">Filter:</span> 
      <button class="w3-button w3-black">Todos</button>
      <button class="w3-button w3-white"><i class="fa fa-diamond w3-margin-right"></i>Faceis</button>
      <button class="w3-button w3-white w3-hide-small"><i class="fa fa-photo w3-margin-right"></i>Moderadas</button>
      <button class="w3-button w3-white w3-hide-small"><i class="fa fa-map-pin w3-margin-right"></i>Dificeis</button>
    </div>
    </div>
  </header>
  
  <!-- First Photo Grid-->
  
  <div class="w3-row-padding">
  <h4 id="contact"><b>Levadas</b></h4>
    <div class="w3-third w3-container w3-margin-bottom">
	 <h5 id="contact"><b>Levada1</b></h5>
      <img src="{{ URL::to('img/a.jpg')}}" alt="Levada" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
       <p><b>Duração</b></p>
	   <p>4h</p>
		 <p><b>Distância</b></p>
		 <p>7km</p>
		 <p><b>Dificuldade</b></p>
		 <p>Moderada</p>
		 <p><b>Preço</b></p>
		 <p>30€</p>
		 <p><b>Descriçao</b></p>
		 <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      </div>
    </div>
    <div class="w3-third w3-container w3-margin-bottom">
	<h5 id="contact"><b>Levada1</b></h5>
      <img src="{{ URL::to('img/b.jpg')}}" alt="Levada2" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
	  <p><b>Duração</b></p>
	   <p>4h</p>
        <p><b>Distância</b></p>
		 <p>7km</p>
		 <p><b>Dificuldade</b></p>
		 <p>Moderada</p>
		 <p><b>Preço</b></p>
		 <p>30€</p>
		 <p><b>Descriçao</b></p>
		 <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      </div>
    </div>
    <div class="w3-third w3-container">
	<h5 id="contact"><b>Levada1</b></h5>
      <img src="{{ URL::to('img/c.jpg')}}" alt="Levada3" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
	  <p><b>Duração</b></p>
	   <p>4h</p>
      <p><b>Distância</b></p>
		 <p>7km</p>
		 <p><b>Dificuldade</b></p>
		 <p>Moderada</p>
		 <p><b>Preço</b></p>
		 <p>30€</p>
		 <p><b>Descriçao</b></p>
		 <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      </div>
    </div>
  </div>
  
  <!-- Second Photo Grid-->
  <div class="w3-row-padding">
    <div class="w3-third w3-container w3-margin-bottom">
	<h5 id="contact"><b>Levada1</b></h5>
      <img src="{{ URL::to('img/d.jpg')}}" alt="Levada4" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
	  <p><b>Duração</b></p>
	   <p>4h</p>
      <p><b>Distância</b></p>
		 <p>7km</p>
		 <p><b>Dificuldade</b></p>
		 <p>Moderada</p>
		 <p><b>Preço</b></p>
		 <p>30€</p>
		 <p><b>Descriçao</b></p>
		 <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      </div>
    </div>
    <div class="w3-third w3-container w3-margin-bottom">
	<h5 id="contact"><b>Levada1</b></h5>
      <img src="{{ URL::to('img/e.jpg')}}" alt="Levada5" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
	  <p><b>Duração</b></p>
	   <p>4h</p>
      <p><b>Distância</b></p>
		 <p>7km</p>
		 <p><b>Dificuldade</b></p>
		 <p>Moderada</p>
		 <p><b>Preço</b></p>
		 <p>30€</p>
		 <p><b>Descriçao</b></p>
		 <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      </div>
    </div>
    <div class="w3-third w3-container">
	<h5 id="contact"><b>Levada1</b></h5>
      <img src="{{ URL::to('img/f.jpg')}}" alt="Levada6" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
	  <p><b>Duração</b></p>
	   <p>4h</p>
       <p><b>Distância</b></p>
		 <p>7km</p>
		 <p><b>Dificuldade</b></p>
		 <p>Moderada</p>
		 <p><b>Preço</b></p>
		 <p>30€</p>
		 <p><b>Descriçao</b></p>
		 <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      </div>
    </div>
  </div>

  
  <!-- Contact Section -->
  <div class="w3-container w3-padding-large w3-grey">
    <h4 id="contact"><b>Reservas</b></h4>
    <div class="w3-row-padding w3-center w3-padding-24" style="margin:0 -16px">
      <div class="w3-third w3-dark-grey">
        <p><i class="fa fa-envelope w3-xxlarge w3-text-light-grey"></i></p>
        <p>gouveiaparadisetravel@gmail.com</p>
      </div>
      <div class="w3-third w3-teal">
        <p><i class="fa fa-map-marker w3-xxlarge w3-text-light-grey"></i></p>
        <p>Funchal, Madeira</p>
      </div>
      <div class="w3-third w3-dark-grey">
        <p><i class="fa fa-phone w3-xxlarge w3-text-light-grey"></i></p>
        <p>291457621</p>
      </div>
    </div>
    <hr class="w3-opacity">
    <form action="/action_page.php" target="_blank">
		<!--<div class="form-group">
			<label for="exampleInputEmail1">Email address</label>
			<input type="email" class="form-control"  placeholder="Email">
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Password</label>
			<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Password</label>
			<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Password</label>
			<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		</div>-->

	 
     <div class="w3-section">
        <label>Nome</label>
        <input class="w3-input w3-border" type="text" name="Name" required>
      </div>
	  <div class="w3-section">
        <label>Contato</label>
        <input class="w3-input w3-border" type="text" name="Name" required>
      </div>
      <div class="w3-section">
        <label>Email</label>
        <input class="w3-input w3-border" type="text" name="Email" required>
      </div>
      <div class="w3-section">
        <label>Mensagem</label>
        <input class="w3-input w3-border" type="text" name="Messagem" required>
      </div>
      <button type="submit" class="w3-button w3-black w3-margin-bottom"><i class="fa fa-paper-plane w3-margin-right"></i>Submeter</button>
    </form>
  </div>

  <!-- Footer -->
  
  <footer class="w3-container w3-padding-32 w3-dark-grey">

  <div class="w3-row-padding">
  
    <div class="w3-third">
		<h4 id="contact"><b>Sobre Nos</b></h4>
      <h3>Duvidas</h3>
      <p>Em caso de duvida sinta-se livre para nos contatar</p>
      
    </div>
  
    <div class="w3-third">
      <h3>Informaçao</h3>
      <ul class="w3-ul w3-hoverable">
        <li class="w3-padding-16">
          <i class="fa fa-envelope fa-fw w3-margin-right"></i>
          <span class="w3-large">Email</span><br>
          <span>gouveiaparadisetravel@gmail.com</span>
        </li>
        <li class="w3-padding-16">
          <i class="fa fa-phone fa-fw w3-margin-right"></i>
          <span class="w3-large">Contato</span><br>
          <span>291457621</span>
        </li> 
      </ul>
    </div>

    <div class="w3-third">
      <h3>Redes Socias</h3>
      <p>
        <img src="{{ URL::to('img/twitter.png')}}" class="w3-left w3-margin-right" style="width:40px">
		 <img src="{{ URL::to('img/facebook.png')}}" class="w3-left w3-margin-right" style="width:40px">
		  <img src="{{ URL::to('img/tripadvisor.png')}}" class="w3-left w3-margin-right" style="width:40px">
		   <img src="{{ URL::to('img/google.png')}}" class="w3-left w3-margin-right" style="width:40px">
		    <img src="{{ URL::to('img/instagram.png')}}" class="w3-left w3-margin-right" style="width:40px">
			 <img src="{{ URL::to('img/whatsapp.png')}}" class="w3-left w3-margin-right" style="width:40px">
       
      </p>
    </div>

  </div>
  </footer>
  
  <div class="w3-black w3-center w3-padding-24"></div>

<!-- End page content -->
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
</script>

</body>

