<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Presidencia Municipal de Salamanca, Guanajuato</title>
<link rel="icon" href="/img/omc.ico">

<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="header">
  <div class="header-left-panel">
    <div class="logo-wrap">
      <div class="logo">
        <img src="/img/logosalamanca.jpg" alt="Salamanca" width="280" height="100">

      </div>
    </div>
  </div>
  <div class="header-right-panel">
    <br>
    <br>
    <div class="menu">
      <ul>
        <li class="marRight20"><a href="{{url('/inicio')}}">Inicio</a></li>
        <li class="marRight20"><a href="{{url('/buscar')}}">Empleos</a></li>
        <li><a class="active" href="{{url('/directorio')}}">directorio</a></li>
        <li class="marRight20"><a href="{{url('/contactanos')}}">contáctanos</a></li>
      </ul>
    </div>
  </div>
</div>
<!--- panel wrap div end -->
<div class="page-wrap">
  <div class="page-wrapper">
    <div class="primary-content marRight30">
      <div class="mid-panel">
        <div class="panel">
          <div class="title">
            <h1>DIRECTORIO</h1>
            <!-- <h2>Gabinete </h2> -->
          </div>
          @yield('content')
          <div class="clearing"></div>
        </div>
      </div>
    </div>
    <div class="sidebar">
      <div class="search-panel">
        <div class="content">
          <div class="title">
            <h1>Buscar</h1>
          </div>
          <div class="border"></div>
          <h2>Buscar en el sitio...</h2>
          <div class="searchbox">
            <input type="text" class="input" value="" />
            <div class="button"><a href="#"></a></div>
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
            <!-- <li class="borderNone padBottom20"><a href="#">In condimentum velit at ipsum portti</a></li> -->
          </ul>
        </div>
      </div>
      <div class="midpanel">
        <div class="content">
          <div class="title">
            <h1>Twitter</h1>
          </div>
          <div class="border"></div>
          <div class="container">
            <div class="left marRigth20">
              <blockquote class="twitter-tweet" data-lang="es"><p lang="es" dir="ltr">La alcaldesa <a href="https://twitter.com/BettyHdezC?ref_src=twsrc%5Etfw">@BettyHdezC</a> continúa sus recorridos por las comunidades de <a href="https://twitter.com/hashtag/Salamanca?src=hash&amp;ref_src=twsrc%5Etfw">#Salamanca</a> para escuchar y atender las necesidades más importantes de la población; en esta ocasión visitó la comunidad San José de Mendoza. <a href="https://t.co/3QF5gBIZV5">pic.twitter.com/3QF5gBIZV5</a></p>&mdash; Gobierno Salamanca (@GobSalamanca) <a href="https://twitter.com/GobSalamanca/status/1123326892893986816?ref_src=twsrc%5Etfw">30 de abril de 2019</a></blockquote>
  <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>



          </div>
          </div>

        </div>
      </div>
    </div>
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
</body>
</html>
