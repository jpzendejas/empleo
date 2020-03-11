@extends('layouts.admin')
@section('content')
{{Form::token()}}
<input id="av" type="hidden" name="" value="AplicacionVacantes">
<table id="dgas" title="Aplicación a Vacantes" class="easyui-datagrid" style="width:100%;height:75%;"
            url="get_aplicacion"
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="nombre" width="50" sortable="true">Nombre</th>
                <th field="apellidos" width="50" sortable="true">Apellidos</th>
                <th field="genero" width="50" sortable="true">Género</th>
                <th field="edad" width="50" sortable="true">Edad</th>
                <th field="escolaridad" width="50" sortable="true">Escolaridad</th>
                <th field="telefono" width="50" sortable="true">Telefonos</th>
                <th field="correo" width="50" sortable="true">Correo Electrónico</th>
                <th field="puesto" width="50" sortable="true">Vacante</th>
                <th field="fecha_aplicacion" width="50" sortable="true">Fecha Aplicación</th>
                <th field="cv" width="50">CV</th>
                <th field="estatus" width="50" sortable="true">Estatus</th>

                <th field="id" width="50" hidden>ID</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <input id="buscar" name="buscar" class="easyui-textbox" style="width:10%"> <a id="bs" class="easyui-linkbutton" iconCls="icon-search" style="width:100px">Buscar</a>
        <a id ="verAplicacion" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true">Ver Aplicación</a>
        <!-- <a id ="newVacante" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true">Nueva Vacante</a>
        <a id="exportarVacante" class="easyui-linkbutton" iconCls="icon-reload" style="width:100px">Exportar</a> -->
        <!-- <a id ="destroyVacante" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true">Eliminar Vacante</a> -->
    </div>
    <a id="my_iframe" href=""  download></a>

    <div id="dlgv" class="easyui-dialog" title="Aplicación a Vacante" closed="true" data-options="iconCls:'icon-help'" style="width:400px;height:350px;padding:10px">
      <ul>
        <center>
          <h5>Datos del Aplicante</h5>
        </center>
        <br>
        <li id="nombre"></li>
        <li id="apellidos"></li>
        <li id="genero"></li>
        <li id="edad"></li>
        <li id="escolaridad"></li>
        <li id="telefono"></li>
        <li id="correo"></li>
        <li id="vacante">:</li>
        <li id="fecha"></li>
        <li><a id="cv" href="#" download>CV</a></li>
        </ul>
        <center>
        <a id="reclutar" href="javascript:void(0)" class="easyui-linkbutton" plain="true" iconCls="icon-add" style="width:30%;height:50px;">Reclutar</a>
        <a id="disponible" href="javascript:void(0)" class="easyui-linkbutton" plain="true" iconCls="icon-reload" style="width:30%;height:50px;">Disponible</a>
        <a id="descartar" href="javascript:void(0)" class="easyui-linkbutton" plain="true" iconCls="icon-cancel" style="width:30%;height:50px;">Descartar</a>
      </center>
    </div>

    <div id="dlg" class="easyui-dialog" style="width:400px"
            closed="true" buttons="#dlg-buttons">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
          {{ csrf_field() }}


            <div style="margin-bottom:10px">
              <span>Vacante</span>
              <input name="puesto" class="easyui-textbox" required="true" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
              <span>Salario</span>
              <input name="salario" class="easyui-numberbox" required="true" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
              <span>Numero de Plazas</span>
              <input name="numero_plazas" class="easyui-numberbox" required="true" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
              <span>Edad</span>
              <input name="edad" class="easyui-textbox" required="true" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
              <span>Habilidades</span>
              <input name="habilidades" class="easyui-textbox" required="true" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
              <span>Convocatoria</span>
              <input  id="pdf" name="pdf" class="easyui-filebox" required="true" style="width:100%" placeholder="pdf">
            </div>
            <div style="margin-bottom:10px">
              <span>Estado Civil</span>
              <input id="ec" class="easyui-combobox" name="estado_civil_id" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
              <span>Escolaridad</span>
              <input id="es" class="easyui-combobox" name="escolaridad_id" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
              <span>Experiencia</span>
              <input id="ex" class="easyui-combobox" name="experiencia_id" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
              <span>Causa de la Vacante</span>
              <input id="ca" class="easyui-combobox" name="causa_id" style="width:100%">
            </div>
            <div id="di" style="margin-bottom:10px">
              <span id="sp">Prestaciones</span>
              <div id="dl" name="prestaciones"></div>
            </div>
          <input type="hidden" id="pr" name="prestaciones">
        </form>

    <div id="dlg-buttons">
        <a id ="saveVacante" href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
    </div>

@endsection
