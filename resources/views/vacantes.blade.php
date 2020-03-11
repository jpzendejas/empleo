@extends('layouts.admin')
@section('content')
{{Form::token()}}
<input type="hidden" name="posicion" value="vacantes">
<table id="dg" title="Vacantes" class="easyui-datagrid" style="width:100%;height:65%;"
            url="get_vacante"
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="numero_vacante" width="50"># Vacante</th>
                <th field="puesto" width="50" sortable="true">Vacante</th>
                <th field="salario" width="50" sortable="true">Salario</th>
                <th field="numero_plazas" width="50">Numero de Plazas</th>
                <th field="edad" width="50">Edad</th>
                <th field="habilidades" width="50">Habilidades</th>

                <th field="pdf" width="50" hidden>Pdf</th>
                <th field="fecha_expiracion" width="50">Fecha de Expiración</th>

                <th field="estado_civil" width="50" >Estado Civil</th>
                <th field="experiencia" width="50" > Experiencia </th>
                <th field="causa" width="50" >Causa</th>
                <th field="escolaridad" width="50" >Escolaridad</th>
                <th field="empresa" width="50" >Empresa</th>
                <th field="estado_civil_id" width="50" hidden>estado_civil_id</th>
                <th field="escolaridad_id" width="50" hidden>escolaridad_id</th>
                <th field="experiencia_id" width="50" hidden>experiencia_id</th>
                <th field="causa_id" width="50" hidden>causa_id</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a id ="newVacante" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true">Nueva Vacante</a>
        <a id ="editVacante" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true">Editar Vacante</a>
        <span>Buscar:</span>
        <input id="buscar" name="buscar" class="easyui-textbox" style="width:10%"> <a id="bs" class="easyui-linkbutton" iconCls="icon-search" style="width:100px">Buscar</a>
        <a id="exportarVacante" class="easyui-linkbutton" iconCls="icon-reload" style="width:100px">Exportar</a>
        <!-- <a id ="destroyVacante" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true">Eliminar Vacante</a> -->
    </div>

    <div id="dlg" class="easyui-dialog" style="width:400px"
            closed="true" buttons="#dlg-buttons">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
          {{ csrf_field() }}
          <div style="margin-bottom:10px">
            <span>Numero de Vacante</span>
            <input name="numero_vacante" id='numero_vacante' class="easyui-textbox" data-options="readonly:true" style="width:100%">
          </div>
          @if(Auth::user()->name == "Administrador" )
          <div style="margin-bottom:10px">
            <span>Empresa</span>
            <input id="emp" class="easyui-combobox" name="emp" style="width:100%">
          </div>
          @endif
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
            <div style="margin-bottom:10px">
              <span>Fecha de Expiración</span>
              <input id="fe" type="text" name="fecha_expiracion" style="width:100%">
            </div>
            <div id="di" style="margin-bottom:10px">
              <span id="sp">Prestaciones</span>
              <div id="dl" name="prestaciones"></div>
            </div>
          <input type="hidden" id="pr" name="prestaciones" >
        </form>

    <div id="dlg-buttons">
        <a id ="saveVacante" href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
    </div>

@endsection
