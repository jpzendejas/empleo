<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bolsa de Empleo Salamanca, Guanajuato</title>
<link rel="icon" href="img/omc.ico">

<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

<style media="screen">
input[type=text], input[type=password] {
width: 100%;
padding: 12px 20px;
margin: 8px 0;
display: inline-block;
border: 1px solid #ccc;
box-sizing: border-box;
}
/* Set a style for all buttons */
button {
background-color: #5c2d3f;
color: white;
/* padding: 14px 20px; */
margin: 8px 0;
border: none;
cursor: pointer;
width: 170px;
height: 40px;
}

button:hover {
opacity: 0.8;
}

.botton {
background-color: #5c2d3f;
color: white;
/* padding: 14px 20px; */
margin: 8px 0;
border: none;
cursor: pointer;
width: 170px;
height: 40px;
align-items: center;
}

.botton:hover {
opacity: 0.8;
}
/* Extra styles for the cancel button */
.cancelbtn {
width: auto;
padding: 10px 18px;
background-color: #5c2d3f;
color: #fcb600;
}

/* Center the image and position the close button */
.imgcontainer {
text-align: center;
margin: 24px 0 12px 0;
position: relative;
}

img.avatar {
width: 40%;
border-radius: 50%;
}

.container {
padding: 16px;
}

span.psw {
float: right;
padding-top: 16px;
}

/* The Modal (background) */
.modal {
display: none; /* Hidden by default */
position: fixed; /* Stay in place */
z-index: 1; /* Sit on top */
left: 0;
top: 0;
width: 100%; /* Full width */
height: 100%; /* Full height */
overflow: auto; /* Enable scroll if needed */
background-color: rgb(0,0,0); /* Fallback color */
background-color: rgba(0,0,0,0.5); /* Black w/ opacity */
padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
background: url(img/logoarmas.jpg);
background-repeat: no-repeat;
background-size: cover;
margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
border: 1px solid #888;
width: 40%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
position: absolute;
right: 25px;
top: 0;
color: #000;
font-size: 35px;
font-weight: bold;
}

.close:hover,
.close:focus {
color: red;
cursor: pointer;
}

/* Add Zoom Animation */
.animate {
-webkit-animation: animatezoom 0.6s;
animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
from {-webkit-transform: scale(0)}
to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
from {transform: scale(0)}
to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
span.psw {
   display: block;
   float: none;
}
.cancelbtn {
   width: 100%;
}


}
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(./img/preloader.gif) center no-repeat #fff;
}
}

</style>
</head>
<body id="app-layout">
<div class="se-pre-con"></div>

<div class="header">
  <div class="header-left-panel">
    <div class="logo-wrap">
      <div class="logo">
        <!-- <img src="/img/logosalamanca.jpg" alt="Salamanca" width="250" height="75"> -->
      </div>
    </div>
  </div>
  </div>

<!--- panel wrap div end -->
<div class=" container-fluid page-wrap">
  <div class="page-wrapper">
    <div class="primary-content marRight30">
      <div class="mid-panel">
        <div class="panel">
          <div class="title">
            <h1>Bolsa de Empleo Salamanca, Gto.</h1>
            <h2>Empleos</h2>
          </div>
          @yield('content')
        </div>
      </div>
    </div>
    <div class="sidebar">
      <div class="search-panel">
        <div class="content">
          <div class="title">
            <h1 style="text-align:center;">Buscar Empleos</h1>
          </div>
          <div class="border" style="margin-top:5px;"></div><br>
          <!-- <h2>Buscar en el sitio...</h2> -->
          <div class="searchbox">
            <form action="buscarvacantes" method="get">
              <input type="text" id="search" name="puesto" placeholder="Puesto" required>
              <br>
              <input type="submit" value="Buscar" class="botton">
            </form>

          </div>
        </div>
      </div>
      <div class="midpanel">
        <div class="content marginBottom">
          <div class=" title"><br>
            <h1 class="text-center">Accesos Directos</h1>
          </div>
          <div class="border" style="margin-top:5px;"></div>
          <div class="" style="margin-left:10px; margin-right:10px;">
            <ul>
              <li style="margin-top:15px;"><a href="https://www.salamanca.gob.mx/empleo/public/buscar">INICIO</a></li>
              <li><a href="https://www.salamanca.gob.mx">salamanca.gob.mx</a></li>
              <li><a href="https://www.salamanca.gob.mx/sare" target="_blank">SARE</a></li><br><br>
            </ul>
          </div>

        </div>
      </div>
      <div class="midpanel">
        <div class="content" style="background-color:none;">
          <div class=" title">
            <h1 class="text-center">Twitter</h1>
          </div>
          <div class="border"></div>
          <div class="">
            <div class="left marRigth20">
              <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script><br>
              <a id="tw" class="twitter-timeline" href="https://twitter.com/@GobSalamanca" data-tweet-limit="3" style="">Tweets by @GobSalamanca</a><br><br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!--- page wrap div end -->
<div class="footer" class="img-responsive" >
  <p style=""><br>
    <a href="https://www.facebook.com/GobSalamanca/">
      <img align="top" src="img/fb.png" alt="">
    </a>
    <a href="https://twitter.com/GobSalamanca">
      <img align="top" src="img/tw.png" alt="">
    </a> <br><br>
    <!-- Portal Octaviano Muñoz Ledo s/n, Zona Centro. Telefono.(464)641-4500. -->
    <span>Dirección General de Desarrollo Económico<br></span>
    <a style="color:#ffffff;" class="ubicacion_link" target="_blank" href="https://www.google.com.mx/maps/place/Av+Leona+Vicario+323,+San+Juan+Chihuahua,+36744+Salamanca,+Gto./@20.584677,-101.2082127,17z/data=!3m1!4b1!4m5!3m4!1s0x842c85001c059f33:0x4d7002f50dd33146!8m2!3d20.584677!4d-101.206024?hl=es">
         Leona Vicario No.323, &nbsp;Col. San Juan Chihuahua. </a><br>
</p>
</div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  h2= table.getElementsByTagName("h2");
  for (i = 0; i < h2.length; i++) {
    h3 = h2[i].getElementsByTagName("h3")[0];
    if (td) {
      txtValue = h3.textContent || h3.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        h2[i].style.display = "";
      } else {
        h2[i].style.display = "none";
      }
    }
  }
}
</script>
<script type="text/javascript">
$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").delay(2000).fadeOut("slow");;
	});

</script>




</body>
</html>
