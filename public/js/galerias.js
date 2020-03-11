$(document).ready(function(){
  var url;

  var newGaleria = function(){
      $('#dlg').dialog('open').dialog('center').dialog('setTitle','Nueva Galeria');
      $('#fm').form('clear');
      $('#ex').datebox({
        formatter: function(date){
          var y=date.getFullYear();
          var m=date.getMonth()+1;
          var d=date.getDate();
          return y+'-'+(m<10? ('0'+ m):m)+'-'+(d<10?('0'+d):d);
        },
        parser: function(s){
          if(!s) return new Date();
          var ss= s.split('-');
          var y=parseInt(ss[0],10);
          var m=parseInt(ss[1],10);
          var d=parseInt(ss[2],10);
          if(!isNaN(y) && !isNaN(m) && !isNaN(d)){
            return new Date(y,m-1,d);
          }else{
            return new Date();
          }
        }
      });
      url = 'save_galeria';
  }

  var editGaleria=function(){
      var row = $('#dg').datagrid('getSelected');
      if (row){
          $('#dlg').dialog('open').dialog('center').dialog('setTitle','Editar Galeria');
          $('#fm').form('load',row);
          $('#imagen').filebox({
            required:false
          });
          $('#ex').datebox({
            formatter: function(date){
              var y=date.getFullYear();
              var m=date.getMonth()+1;
              var d=date.getDate();
              return y+'-'+(m<10? ('0'+ m):m)+'-'+(d<10?('0'+d):d);
            },
            parser: function(s){
              if(!s) return new Date();
              var ss= s.split('-');
              var y=parseInt(ss[0],10);
              var m=parseInt(ss[1],10);
              var d=parseInt(ss[2],10);
              if(!isNaN(y) && !isNaN(m) && !isNaN(d)){
                return new Date(y,m-1,d);
              }else{
                return new Date();
              }
            }
          });
          url = 'update_galeria/'+row.id;
      }
  }
  var saveGaleria=function(){
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
                      title: 'Bolsa de Empleo Salamanca, Gto',
                      msg: result.errorMsg
                  });
              } else {
                  $('#dlg').dialog('close');        // close the dialog
                  $('#dg').datagrid('reload');    // reload the user data
              }
          }
      });
  }
  var destroyGaleria=function(){
      var row = $('#dg').datagrid('getSelected');
      if (row){
          $.messager.confirm('Bolsa de Empleo Salamanca','Eliminar Galeria?',function(r){
              if (r){
                  $.post('destroy_galeria',{id:row.id},function(result){
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
$('#newGaleria').on('click', newGaleria);
$('#saveGaleria').on('click', saveGaleria);
$('#editGaleria').on('click', editGaleria);
$('#destroyGaleria').on('click', destroyGaleria);

});
