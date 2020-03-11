<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bolsa de Empleo Salamanca, Guanajuato</title>
<link rel="icon" href="/img/omc.ico">

<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="header">
  <div class="header-left-panel">
    <div class="logo-wrap">
      <div class="logo">
        <!-- <img src="/img/logosalamanca.jpg" alt="Salamanca" width="280" height="100"> -->
        <br>
      </div>
    </div>
  </div>
  <!-- <div class="header-right-panel">
    <br>
    <br>
    <div class="menu">
      <ul>
        <li class="marRight20"><a class="active" href="{{url('/inicio')}}">Inicio</a></li>
        <li class="marRight20"><a href="{{url('/buscar')}}">Empleos</a></li>
        <li><a href="{{url('/contactanos')}}">contáctanos</a></li> -->
        <!-- <li class="marRight20"><a href="{{url('/contactanos')}}" target="_blank">contáctanos</a></li> -->
        <!-- <li class="marRight20"><a href="gaceta.html">gaceta</a></li> -->
        <!-- <li><a href="contactanos.html">contáctanos</a></li> -->
      <!-- </ul>
    </div>
  </div> -->
</div>
<div class="navbar">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <!-- <a class="navbar-brand" href="#">WebSiteName</a> -->
      </div>
      <ul class="nav navbar-nav navbar-right">
        <!-- <li class="active"><a href="#">Home</a></li> -->
        <li class="active"><a href="{{url('/inicio')}}"><h4><strong>INICIO</strong></h4></a></li>
        <li><a href="{{url('/buscar')}}"><h4><strong>EMPLEOS</strong></h4></a></li>
        <li><a href="{{url('/contactanos')}}"><h4><strong>CONTÁCTANOS</strong></h4></a></li>

      </ul>
    </div>
    <img src="/img/slide.jpg" alt="" height="550" width="100%">
  </nav>

</div>

<!--- panel wrap div end -->
<div class="clearing"></div>
<div class="page-wrap">
  <div class="top-content">
    <h1>Bienvenidos a Bolsa de Empleo Salamanca, GTO</h1>
    <div class="top-border"></div>
    <p>Salamanca es hogar de gente buena, de trabajo, de esfuerzo. Los salmantinos queremos vivir en tranquilidad con nuestras familias, por eso eligieron un cambio; con su decisión la historia de nuestra querida ciudad ha dado un giro y me han otorgado el alto honor de dirigir a nuestro municipio los siguientes tres años.</p>
      <p>Desde el 10 de octubre de 2018 me comprometí ante todos los ciudadanos y representantes de diversos sectores del municipio a mantenernos siempre Firmes en la Verdad y a trabajar sin descanso, con transparencia y pasión, para enfrentar y resolver los problemas que a diario aquejan a nuestro municipio y sus comunidades: la inseguridad, la corrupción, la impunidad y el deterioro en la calidad de nuestra vida.</p>
      <p>Nuestro Programa de Gobierno Municipal que regirá mi gestión tiene cuatro ejes fundamentales de acción.</p>
    <p>  El principal y de la más alta prioridad, es la Seguridad; en el que de la mano de un gran equipo y con el apoyo de los salmantinos, trabajamos con profesionalismo para iniciar la recuperación y formación de la nueva policía; integrada por los mejores hombres y mujeres al servicio de los ciudadanos; una policía de cercanía para que podamos volver a vivir con tranquilidad.</p>
      <p>El segundo eje es el Desarrollo Humano, estamos decididos a hacer llegar los programas sociales a quienes verdaderamente los necesitan; también se ha duplicado el presupuesto del DIF Municipal para atender lo más valioso que tenemos: nuestra familia.</p>
      <p>En el tercer eje, el Desarrollo Económico, impulsamos y fortalecemos la economía interna del municipio con la entrega de apoyos para quienes quieran emprender un negocio; este Gobierno es vínculo entre los ciudadanos y las empresas más importantes de la región, y se están generando las condiciones y facilidades para atraer inversiones propias y foráneas.</p>
      <p>En el cuarto eje, la infraestructura, se prepara a nuestro municipio para el futuro inmediato, bien conectado, con equipamiento urbano y movilidad que nos convierta en el mejor lugar para vivir e invertir.</p>
      <p>Es a través de estos cuatro ejes y con el esfuerzo conjunto de sociedad y Gobierno que tendremos una ciudad segura, justa, moderna y ordenada, por la que trabajamos día a día con amor, pasión y transparencia para dar respuesta a las peticiones de nuestra gente y sus familias; con seguridad vendrá lo mejor.<br><br></p>
      <br>
      <p>María Beatriz Hernández Cruz</p>
 <!-- Desde el 10 de octubre de 2018 me comprometí ante todos los ciudadanos y representantes de diversos sectores del municipio a trabajar sin descanso, con transparencia y pasión, para enfrentar y resolver los problemas que a diario aquejan a nuestro municipio y sus comunidades: la inseguridad, la corrupción, la impunidad y el deterioro en la calidad de nuestra vida.</p> -->
    <div class="bottom-border"></div>
    <!-- <div class="button-link"><a href="#">readmore</a></div> -->
  </div>
  <div class="page-wrapper">
    <div class="primary-content marRight30 ">
      <div class="toppanel">
        <div class="container">
          <h1>Comunicados</h1>
          @include('convocatorias')
  </div>
  <br>

      </div>
      <div class="mid-panel marginTop">
        <div class="mid-panel-content">
          <div class="title">
            <h1>Galería</h1>
          </div>
          <div class="border"></div>
          @include('galerias')


          <!-- <div class="img"> <img src="images/img-6.jpg"/> </div> -->
        </div>
      </div>

    </div>
    <div class="sidebar">
      <div class="search-panel">
        <div class="content">
          <div class="title">
            <h3>Novedades</h3>
              <!-- <img align="top" src="images/twitter.png" alt="" width="20" height="25"></h3> -->
          </div>
          <div class="border"></div>
          <!-- <h2>Buscar en el sitio...</h2> -->
          <div class="searchbox">
            <!-- <input type="text" class="input" value="" />
            <div class="button"><a href="#"></a></div> -->
          <blockquote class="twitter-tweet" data-lang="es"><p lang="es" dir="ltr">Alumnos de la secundaria José Vasconcelos del programa &quot;República Escolar&quot;, realizaron una Sesión de Cabildo Infantil en la Presidencia Municipal de <a href="https://twitter.com/hashtag/Salamanca?src=hash&amp;ref_src=twsrc%5Etfw">#Salamanca</a>. Fueron recibidos por la alcaldesa <a href="https://twitter.com/BettyHdezC?ref_src=twsrc%5Etfw">@BettyHdezC</a> y por Síndicos y Regidores del H. Ayuntamiento. <a href="https://t.co/AOfVivW8Bk">pic.twitter.com/AOfVivW8Bk</a></p>&mdash; Gobierno Salamanca (@GobSalamanca) <a href="https://twitter.com/GobSalamanca/status/1134173720082296833?ref_src=twsrc%5Etfw">30 de mayo de 2019</a></blockquote>
          <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>


          </div>
        </div>
      </div>
      <div class="midpanel">
        <div class="content marginBottom">
          <div class="title">
            <h1>Accesos Directos</h1>
          </div>
          <div class="border"></div>
          <ul>
            <li><a href="/salamanca/pdfs/ProgramadeGobiernoMunicipalultimofoto2.pdf" target="_blank">Programa de Gobierno Municipal</a></li>
            <li><a href="https://www.youtube.com/watch?v=uPedd3AJk84" target="_blank">15a Sesión Ordinaria del H. Ayuntamiento.</a></li>
            <li><a href="/salamanca/pdfs/CONVOCATORIA_PEJ_2019.pdf" target="_blank">Premio Estatal de la Juventud 2019</a></li>
            <li><a href="https://www.youtube.com/watch?v=Wz5UEZPl3eE" target="_blank">14a Sesión Ordinaria del H. Ayuntamiento</a></li>
            <li><a href="http://www.salamanca.gob.mx/Transparencia/Transparencia.htm" target="_blank">Transparencia</a></li>
            <li><a href="http://saresalamanca.mx/sare/" target="_blank">SARE</a></li>
            <!-- <li class="borderNone padBottom20"><a href="#"></a></li> -->
          </ul>
        </div>
      </div>
      <!-- <div class="midpanel">
        <div class="content">
          <div class="title">
            <h1>Agenda</h1>
          </div>
          <div class="border"></div>
          <div class="container">
            <div class="row row-striped">
			<div class="col-2 text-right">
				<h1 class="display-4"><span class="badge badge-secondary">29</span></h1>
				<h2>ABR</h2>
			</div>
			<div class="col-5">
				<h3 class="text-uppercase"><strong>15a Sesión Ordinaria del H. Ayuntamiento de Salamanca, Gto.</strong></h3>
				<ul class="list-inline">
				    <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> Lunes</li>
					<li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> 2:00 PM - 4:00 PM</li>
					<li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> Sala de Cabildos</li>
				</ul>
				<p>15a Sesión Ordinaria del H. Ayuntamiento de Salamanca, Gto.</p>
			</div>
		</div>
		<!-- <div class="row row-striped">
			<div class="col-2 text-right">
				<h1 class="display-4"><span class="badge badge-secondary">27</span></h1>
				<h2>OCT</h2>
			</div>
			<div class="col-10">
				<h3 class="text-uppercase"><strong>Operations Meeting</strong></h3>
				<ul class="list-inline">
				    <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> Friday</li>
					<li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> 2:30 PM - 4:00 PM</li>
					<li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> Room 4019</li>
				</ul>
				<p>Lorem ipsum dolsit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
		</div> -->


          <!-- </div>
        </div>
    </div> -->
  </div>
</div>
</div>

<!--- page wrap div end -->
<div class="footer">
  <p>Portal Octaviano Muñoz Ledo s/n, Zona Centro. Telefono.(464)641-4500. <br><br>
  <a href="https://www.facebook.com/GobSalamanca/">
    <img align="top" src="/img/FB_logo.png" alt="">
  </a>
  <a href="https://twitter.com/GobSalamanca">
    <img align="top" src="/img/Twitter_logo.png" alt="">
  </a> <br><br>
  Última Actualización: 20/05/2019.
</p>
</div>
<script>
function openModal() {
  document.getElementById("myModal").style.display = "block";
}

function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
</body>
</html>
