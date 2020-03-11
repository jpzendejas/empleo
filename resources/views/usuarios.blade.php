@extends('layouts.admin')
@section('content')

{{Form::token()}}
<table id="dg" title="Usuarios" class="easyui-datagrid" style="width:100%;height:115%;"
            url="get_usuario"
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <!-- <th field="id" width="50">ID</th> -->
                <th field="name" width="50">Nombre</th>
                <th field="email" width="50">Correo</th>
                <th field="password" width="50">Contraseña</th>
                <th field="empresa" width="50">Empresa</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a id ="newUsuario" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true">Nuevo Usuario</a>
        <a id ="editUsuario" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true">Editar Usuario</a>
        <a id ="destroyUsuario" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true">Eliminar Usuario</a>
    </div>
    <div id="dlg" class="easyui-dialog" style="width:400px"
            closed="true" buttons="#dlg-buttons">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
          {{ csrf_field() }}


            <!-- <div style="margin-bottom:20px;font-size:14px;border-bottom:1px solid #ccc">Información de Perfil</div> -->
            <!-- <div style="margin-bottom:10px">
                <input name="id" class="easyui-textbox" required="true" label="First Name:" style="width:100%">
            </div> -->
            <div style="margin-bottom:10px">
              <span>Nombre</span>
              <input name="name" class="easyui-textbox" required="true" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
              <span>Correo</span>
              <input name="email" class="easyui-textbox" required="true" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
              <span>Contraseña</span>
              <input name="password" class="easyui-passwordbox" required="true" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
              <span>Empresa</span>
              <div id="emp" name="empresa_id" style="width:100%"></div>

          </div>


        </form>
    </div>
    <div id="dlg-buttons">
        <a id ="saveUsuario" href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
    </div>

@endsection
