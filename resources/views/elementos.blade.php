@extends('layouts.admin')
@section('content')
{{Form::token()}}
<table id="dg" title="Convocatorias" class="easyui-datagrid" style="width:100%;height:100%;"
            url="get_convocatoria"
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <!-- <th field="id" width="50">ID</th> -->
                <th field="titulo" width="50">Titulo</th>
                <th field="imagen" width="50">Imagen</th>
                <th field="fecha_expiracion" width="50">Fecha de Expiración</th>


            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a id ="newConvocatoria" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true">Nueva Convocatoria</a>
        <a id ="editConvocatoria" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true">Editar Convocatoria</a>
        <a id ="destroyConvocatoria" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true">Eliminar Convocatoria</a>
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
              <span>Titulo</span>
              <input name="titulo" class="easyui-textbox" required="true" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
              <span>Imagen</span>
              <input id="imagen" name="imagen" class="easyui-filebox" required="true" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
              <span>Expiración</span>
              <input id="ex" type="text" name="fecha_expiracion" style="width:100%">
            </div>


        </form>
    </div>
    <div id="dlg-buttons">
        <a id ="saveConvocatoria" href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
    </div>

@endsection
