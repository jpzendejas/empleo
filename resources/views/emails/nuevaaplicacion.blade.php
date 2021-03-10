<!DOCTYPE html>
<html>
<head><meta charset="gb18030">
<title>Nueva Aplicación a Vacante</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
</style>
</head>
<body>
  <div style="padding-left:16px">
    <h2>Nueva Aplicación a Vacante</h2>
    <ul>
      <li>Puesto: <?php echo $vacante->puesto;?></li>
      <li>Nombre: <?php echo $aplicacion->nombre." ".$aplicacion->apellidos;?></li>
      <li>Edad: <?php echo $aplicacion->edad;?></li>
      <li>Genero: <?php echo $aplicacion->genero;?></li>
      <li>Mail: <?php echo $aplicacion->correo;?></li>
      <li>CV: <a href="http://salamanca.gob.mx/empleo/public/cvs/{{$aplicacion->cv}}" target="_blank">CV</a></li>

    </ul>
  </div>

</body>
</html>
