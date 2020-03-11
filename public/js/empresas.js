$(document).ready(function(){
  var url;

  var newEmpresa = function(){
      $('#dlg').dialog('open').dialog('center').dialog('setTitle','Nueva Empresa');
      $('#fm').form('clear');
      $('#est').combobox({
        url:'get_estado',
        valueField:'id',
        textField:'estado',
        onSelect: function(rec){
          var url = 'get_municipio/'+rec.id;
          $('#mun').combobox('reload',url);
        }
      });
      $('#mun').combobox({
        valueField:'id',
        textField:'municipio'
      });
      $('#sec').combobox({
        url:'get_sector',
        valueField:'id',
        textField:'sector'
      });
      url = 'save_empresa';
  }

  var editEmpresa=function(){
      var row = $('#dg').datagrid('getSelected');
      if (row){
          $('#dlg').dialog('open').dialog('center').dialog('setTitle','Editar Empresa');
          $('#fm').form('load',row);
          $('#est').combobox({
            url:'get_estado',
            valueField:'id',
            textField:'estado',
            value:row.estado_id,
            onSelect: function(rec){
              var url = 'get_municipio/'+rec.id;
              $('#mun').combobox('reload',url);
            }
          });
          $('#mun').combobox({
            valueField:'id',
            textField:'municipio',
            value:row.municipio_id

          });
          $('#sec').combobox({
            url:'get_sector',
            valueField:'id',
            textField:'sector',
            value:row.sector_id

          });
          url = 'update_empresa/'+row.id;
      }
  }
  var saveEmpresa=function(){
      $('#fm').form('submit',{
          iframe:false,
          url: url,
          headers: {
              'X-CSRF-Token': $('input[name="_token"]').val()
          },
          onSubmit: function(){
              return $(this).form('validate');
          },
          success: function(result){
              var result = eval('('+result+')');
              if (result.errorMsg){
                  $.messager.show({
                      title: 'OMC Calibrations',
                      msg: result.errorMsg
                  });
              } else {
                  $('#dlg').dialog('close');        // close the dialog
                  $('#dg').datagrid('reload');    // reload the user data
              }
          }
      });
  }
  var destroyEmpresa=function(){
      var row = $('#dg').datagrid('getSelected');
      if (row){
          $.messager.confirm('Bolsa de Empleo Salamanca','Eliminar Empresa?',function(r){
              if (r){
                  $.post('destroy_empresa',{id:row.id},function(result){
                      if (result.success){
                          $('#dg').datagrid('reload');    // reload the user data
                      } else {
                          $.messager.show({    // show error message
                              title: 'Bolsa de Empleo Salamanca',
                              msg: result.errorMsg
                          });
                      }
                  },'json');
              }
          });
      }
  }
$('#newEmpresa').on('click', newEmpresa);
$('#saveEmpresa').on('click', saveEmpresa);
$('#editEmpresa').on('click', editEmpresa);
$('#destroyEmpresa').on('click', destroyEmpresa);

});
