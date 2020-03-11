$(document).ready(function(){
  var url;

  var newUsuario = function(){
      $('#dlg').dialog('open').dialog('center').dialog('setTitle','Nuevo Usuario');
      $('#fm').form('clear');
      $('#emp').combobox({
        url:'get_emp',
        valueField:'id',
        textField:'empresa'
      });


      url = 'save_usuario';
  }

  var editUsuario=function(){
      var row = $('#dg').datagrid('getSelected');
      if (row){
          $('#dlg').dialog('open').dialog('center').dialog('setTitle','Editar Usuario');
          $('#fm').form('load',row);
          $('#emp').combobox({
            url:'get_emp',
            valueField:'id',
            textField:'empresa',
            value: row.empresa_id
          });
          url = 'update_usuario/'+row.id;
      }
  }
  var saveUsuario=function(){
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
  var destroyUsuario=function(){
      var row = $('#dg').datagrid('getSelected');
      if (row){
          $.messager.confirm('Bolsa de Empleo Salamanca','Eliminar Usuario?',function(r){
              if (r){
                  $.post('destroy_usuario',{id:row.id},function(result){
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
$('#newUsuario').on('click', newUsuario);
$('#saveUsuario').on('click', saveUsuario);
$('#editUsuario').on('click', editUsuario);
$('#destroyUsuario').on('click', destroyUsuario);

});
