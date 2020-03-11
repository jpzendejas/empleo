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
      </div>
    </div>
  </div>
  <!-- <div class="header-right-panel">
    <br>
    <br>
    <div class="menu">
      <ul>
        <li class="marRight20"><a  href="{{url('/inicio')}}">Inicio</a></li>
        <li class="marRight20"><a href="{{url('/buscar')}}">Empleos</a></li>
        <li><a href="{{url('/contactanos')}}">contáctanos</a></li> -->

        <!-- <li class="marRight20"><a class="active" href="{{url('/contactanos')}}">contáctanos</a></li> -->
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
        <li><a href="{{url('/inicio')}}"><h4><strong>INICIO</strong></h4></a></li>
        <li><a href="{{url('/buscar')}}"><h4><strong>EMPLEOS</strong></h4></a></li>
        <li class="active"><a href="{{url('/contactanos')}}"><h4><strong>CONTÁCTANOS</strong></h4></a></li>
        <!-- <li><a href="#"><h4><strong>TRANSPARENCIA</strong></h4></a></li>
        <li><a href="#"><h4><strong>GACETA</strong></h4></a></li>
        <li><a href="#"><h4><strong>CONTÁCTANOS</strong></h4></a></li> -->
      </ul>
    </div>
    <!-- <img src="/img/slide.jpg" alt="" height="550" width="100%"> -->
  </nav>

</div>
<!--- panel wrap div end -->
@yield('content')
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
