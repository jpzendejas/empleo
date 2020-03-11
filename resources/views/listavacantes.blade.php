@extends('layouts.searchbar')
@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

@if(count($vacantes) == 0)

<p>No se han encontrado vacantes.</p>
@else
<p>Última actualización: {{date('Y-m-d')}}</p>
@foreach($vacantes as $vacante)
<div id="myTable" class="content marginTop"> <img src="logos/{{$vacante->logo}}" width="200" height="200" class="marRight30"/>
  <h3>{{$vacante->puesto}}</h3>
  <h4>{{$vacante->empresa}}</h4>
  <p>Numero de Plazas: {{$vacante->numero_plazas}}.<br>
    Habilidades: {{$vacante->habilidades}}.<br>
    Experiencia: {{$vacante->experiencia}}.<br>
    Escolaridad: {{$vacante->escolaridad}}.<br>
    Lugar de Trabajo: {{$vacante->municipio}}.<br>
    <!-- Más Información: <a href="pdfs/{{$vacante->pdf}}" target="_blank">PDF</a><br> -->

    <button id="btnap" onclick="document.getElementById('id{{$vacante->id}}').style.display='block'" style="">Aplicar a Vacante</button>

  </p>
  <p></p>

</div>
<div class="clearing"></div>

<div id="id{{$vacante->id}}" class="modal fade" style="width:120%;">
<div class="modal-dialog modal-lg">


  {{ Form::open(array('url' => url('save_aplicaciones'), 'method'=>'post', 'files'=> true, 'class'=>'modal-content animate', 'id'=>'frmFoo', 'style'=>'border:solid gray 1px')) }}
  {{Form::token()}}

  <div class="imgcontainer">
    <span onclick="document.getElementById('id{{$vacante->id}}').style.display='none'" class="close" title="Close Modal">&times;</span>
  </div>
  <div class="container">
    <center>
    <img src="logos/{{$vacante->logo}}" width="150" height="150"/><br><br>
    <h3>{{$vacante->puesto}}</h3><br>
  </center>
  <label for="nombre"><b>Nombre:</b></label>
  {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Nombre', 'required' => 'required']) !!}
  <label for="apellidos"><b>Apellidos:</b></label>
  {!! Form::text('apellidos',null,['class'=>'form-control', 'placeholder'=>'Apellidos', 'required' => 'required']) !!}<br>
  <label for="genero"><b>Genero:</b></label>
  <select id="genero" name="genero" style="width:100%; height:40px; background-color:#fefefe;color:#2D4167;font-size:18px" onchange="this.style.width=100%" required="true">
    <option value="Femenino">Femenino</option>
    <option value="Masculino">Masculino</option>
    <option value="N/A">Prefiero no Especificar</option>
  </select><br>
  <label for="edad"><b>Edad:</b></label>
  <input type="number" name="edad" value="" min="0" style="width:100%; height:40px;">

  <label for="escolaridad"><b>Escolaridad:</b></label>
  <select id="escolaridad_id" name="escolaridad_id" class="form-control" style="width:100%; height:40px; background-color:#fefefe;color:#2D4167;font-size:18px" onchange="this.style.width=100%">
    @foreach($escolaridades as $escolaridad)
    <option value="{{$escolaridad->id}}">{{$escolaridad->escolaridad}}</option>
    @endforeach
  </select><br>
  <label for="telefono"><b>Telefono:</b></label>
  {!! Form::text('telefono',null,['class'=>'form-control', 'placeholder'=>'Telefono', 'required' => 'required']) !!}
  <br>
  <label for="correo"><b>Correo Electrónico:</b></label>
  {!! Form::text('correo',null,['class'=>'form-control', 'placeholder'=>'Correo Electrónico', 'required' => 'required']) !!}

  <label for="cv"><b>CV:</b></label>
  {!! Form::file('cv',null, array('required' => 'false')) !!}
  <input type="hidden" name="vacante_id" value="{{$vacante->id}}">
  </div>
  <div class="container" style="background-color:#f1f1f1">

    <center>
      <button type="submit" class="cancelbtn">Aplicar</button>

    <button type="button" onclick="document.getElementById('id{{$vacante->id}}').style.display='none'" class="cancelbtn">Cancelar</button>
  </center>
    <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
  </div>
  {!! Form::close() !!}
  </div>
</div>
@endforeach

@endif



{{$vacantes->links()}}
@endsection
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
