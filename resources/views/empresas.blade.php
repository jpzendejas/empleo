@extends('layouts.admin')
@section('content')
{{Form::token()}}
<table id="dg" title="Empresas" class="easyui-datagrid" style="width:100%;height:57%;"
            url="get_empresa"
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <!-- <th field="id" width="50">ID</th> -->
                <th field="empresa" width="50" sortable="true">Empresa</th>
                <th field="sector" width="50">Sector</th>
                <th field="numero_empleados" width="50">Numero de Empleados</th>
                <th field="direccion" width="50">Dirección</th>
                <th field="colonia" width="50">Colonia</th>
                <th field="rfc" width="50">RFC</th>
                <th field="codigo_postal" width="50">Codigo Postal</th>
                <th field="telefono" width="50">Telefono</th>
                <th field="correo_electronico" width="50">Correo Electronico</th>
                <th field="logo" width="50">Logo</th>
                <th field="municipio" width="50">Municipio</th>
                <th field="estado" width="50">Estado</th>
                <th field="sector_id" width="50" hidden></th>
                <th field="municipio_id" width="50" hidden></th>
                <th field="estado_id" width="50" hidden></th>




            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a id ="newEmpresa" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true">Nueva Empresa</a>
        <a id ="editEmpresa" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true">Editar Empresa</a>
        <!-- <a id ="destroyEmpresa" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true">Eliminar Empresa</a> -->
    </div>

    <div id="dlg" class="easyui-dialog" style="width:400px"
            closed="true" buttons="#dlg-buttons">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
          {{ csrf_field() }}


            <div style="margin-bottom:10px">
              <span>Empresa</span>
              <input name="empresa" class="easyui-textbox" required="true" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
              <span>Sector</span>
              <input id="sec" class="easyui-combobox" name="sector_id" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
              <span>Numero de Empleados</span>
              <input name="numero_empleados" class="easyui-textbox" required="true" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
              <span>Dirección</span>
              <input name="direccion" class="easyui-textbox" required="true" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
              <span>Colonia</span>
              <input name="colonia" class="easyui-textbox" required="true" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
              <span>Estado</span>
              <input id="est" class="easyui-combobox" name="estado_id" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
              <span>Municipio</span>
              <input id="mun" class="easyui-combobox" name="municipio_id" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
              <span>RFC</span>
              <input name="rfc" class="easyui-textbox" required="true" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
              <span>Codigo Postal</span>
              <input name="codigo_postal" class="easyui-textbox" required="true" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
              <span>Telefono</span>
              <input name="telefono" class="easyui-textbox" required="true" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
              <span>Correo Electronico</span>
              <input name="correo_electronico" class="easyui-textbox" required="true" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
              <span>Logo</span>
              <input name="logo" class="easyui-filebox" required="true" style="width:100%">
            </div>



        </form>

    <div id="dlg-buttons">
        <a id ="saveEmpresa" href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
    </div>

@endsection
