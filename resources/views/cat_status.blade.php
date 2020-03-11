@extends('layouts.admin')
@section('content')
{{Form::token()}}
<table id="dg" title="Status" class="easyui-datagrid" style="width:100%;height:140%;"
            url="/get_status"
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <!-- <th field="id" width="50">ID</th> -->
                <th field="status_name" width="50">Status</th>


            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a id ="newStatus" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true">New Status</a>
        <a id ="editStatus" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true">Edit Status</a>
        <a id ="destroyStatus" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true">Destroy Status</a>
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
              <span>Status</span>
              <input name="status_name" class="easyui-textbox" required="true" style="width:100%">
            </div>


        </form>
    </div>
    <div id="dlg-buttons">
        <a id ="saveStatus" href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" style="width:90px">Save</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
    </div>

@endsection
