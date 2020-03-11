@extends('layouts.admin')
@section('content')
{{Form::token()}}
<table id="dg" title="Galerias" class="easyui-datagrid" style="width:100%;height:95%;"
            url="get_galeria"
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <!-- <th field="id" width="50">ID</th> -->
                <th field="titulo" width="50">Titulo</th>
                <th field="descripcion" width="50">Descripción</th>
                <th field="img" width="50">Imagen</th>
                <th field="fecha_expiracion" width="50">Fecha de Expiración</th>


            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a id ="newGaleria" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true">Nueva Galería</a>
        <a id ="editGaleria" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true">Editar Galería</a>
        <a id ="destroyGaleria" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true">Eliminar Galería</a>
    </div>

    <div id="dlg" class="easyui-dialog" style="width:400px"
            closed="true" buttons="#dlg-buttons">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
          {{ csrf_field() }}

            <div style="margin-bottom:10px">
              <span>Titulo</span>
              <input name="titulo" class="easyui-textbox" required="true" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
              <span>Descripción</span>
              <input name="descripcion" class="easyui-textbox" required="true" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
              <span>Imagen</span>
              <input id="img" name="img" class="easyui-filebox" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
              <span>Expiración</span>
              <input id="ex" type="text" name="fecha_expiracion" style="width:100%">
            </div>
          </form>
    </div>
    <div id="dlg-buttons">
        <a id ="saveGaleria" href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
    </div>

@endsection
