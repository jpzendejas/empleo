@extends('layouts.admin')
@section('content')
{{Form::token()}}
<table id="dg-giras" title="Aplicación a Vacantes" class="easyui-datagrid" style="width:100%;height:170%;"
            url="get_vacante_giras"
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="numero_vacante" width="50" sortable="true">Puesto</th>
                <th field="puesto" width="50" sortable="true">Puesto</th>
                <th field="empresa" width="50" sortable="true">Empresa</th>
                <th field="telefono" width="50" sortable="true">Telefono</th>
                <th field="direccion" width="50" sortable="true">Dirección</th>
                <th field="correo_electronico" width="50" sortable="true">Correo Electrónico</th>
                <!-- <th field="telefono" width="50" sortable="true">Telefonos</th> -->
            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <input id="buscarinformacion" name="buscar" class="easyui-textbox" style="width:22%"> <a id="bsinformacion" class="easyui-linkbutton" iconCls="icon-search" style="width:100px">Buscar</a>
        <a id ="exportarInformacion" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-reload" plain="true">Exportar</a>
        <!-- <a id ="newVacante" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true">Nueva Vacante</a>
        <a id="exportarVacante" class="easyui-linkbutton" iconCls="icon-reload" style="width:100px">Exportar</a> -->
        <!-- <a id ="destroyVacante" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true">Eliminar Vacante</a> -->
    </div>
@endsection
