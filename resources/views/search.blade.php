@extends('layouts.search')
@section('content')
{{Form::token()}}
<div class="s01">
  <!-- <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
  <form action="buscarvacantes" method="get" class="form-group row">
    <fieldset>
      <center>
      <legend style=""><strong>Bolsa de Empleo</strong>
      </legend>
      <h1 style="color:white; font-weight:bold;">Servicio Gratuito</h1>
    </center>
    </fieldset>
    <div class="inner-form">
      <div class="input-field second-wrap">
        <select id="location" name="Ubicacion" style="width:350px; height:70px; border:1px solid #04467E;background-color:#FFFFFF;color:#2D4167;font-size:18px" onchange="this.style.width=200">
        @foreach($municipios as $municipio)
          <option value="{{$municipio->id}}">{{$municipio->municipio}}</option>
          @endforeach
        </select>
      </div>
      <div class="input-field first-wrap">
        <input id="search" name="puesto" autocomplete="off" list="browsers" placeholder="Puesto de Trabajo" />
        <datalist id="browsers">
          @foreach($vacantes as $vacante)
            <option value="{{$vacante->puesto}}">
          @endforeach
        </datalist>
      </div>

      <div class="input-field third-wrap">
        <button class="btn-search" type="submit">Buscar</button>
      </div>
    </div><br>
    <!--  -->
    <br><br>

    <!-- <div class="col-md-12 formulario" style=" align:center; "><br>
      <div class="form-group row">
        <div class="col-md-5 col-md-offset-3"><br>
          <input class="puesto form-control input-lg" id="search" name="puesto" list="browsers" type="text" placeholder="Puesto de Trabajo" style=" width: 100%; height:90%; border:1px solid #04467E;background-color:#FFFFFF;color:#2D4167; font-size:20px;"><br>
          <datalist id="browsers">
            @foreach($vacantes as $vacante)
            <option value="{{$vacante->puesto}}">
              @endforeach
            </datalist>
          </div><br>

          <div class=" col-md-4"><br>
            <select class=" form-control " id="location" name="Ubicacion" style=" width: 100%; height:90%; border:1px solid #04467E;background-color:#FFFFFF;color:#2D4167; font-size:20px;" onchange="this.style.width=100%">
              @foreach($municipios as $municipio)
              <option value="{{$municipio->id}}">{{$municipio->municipio}}</option>
              @endforeach
            </select><br>
          </div>
          <div class="col-md-3" style="float:right;"><br>
            <button type="submit" class="botonbuscar btn  btn-md" style=" text-align:center; font-size: 20px;">Buscar</button>

          </div>
        </div>
        <br><br>
      </div> -->

  </form>

</div>
@endsection
