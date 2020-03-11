$(document).ready(function(){
  var currentLocation = window.location;
  if (currentLocation == 'http://www.salamanca.gob.mx/empleo/public/usuarios') {
    $('#reportes').children().css({ 'opacity' : 0.50 }).end().css({ 'opacity' : 0.50 });
    $('#vacantes').children().css({ 'opacity' : 0.50 }).end().css({ 'opacity' : 0.50 });
    $('#empresas').children().css({ 'opacity' : 0.50 }).end().css({ 'opacity' : 0.50 });

  }else if (currentLocation == 'http://www.salamanca.gob.mx/empleo/public/vacantes') {
    $('#usuarios').children().css({ 'opacity' : 0.50 }).end().css({ 'opacity' : 0.50 });
    $('#reportes').children().css({ 'opacity' : 0.50 }).end().css({ 'opacity' : 0.50 });
    $('#empresas').children().css({ 'opacity' : 0.50 }).end().css({ 'opacity' : 0.50 });


  }else if (currentLocation == 'http://www.salamanca.gob.mx/empleo/public/empresas') {
    $('#vacantes').children().css({ 'opacity' : 0.50 }).end().css({ 'opacity' : 0.50 });
    $('#usuarios').children().css({ 'opacity' : 0.50 }).end().css({ 'opacity' : 0.50 });
    $('#reportes').children().css({ 'opacity' : 0.50 }).end().css({ 'opacity' : 0.50 });

  }else if (currentLocation == 'http://www.salamanca.gob.mx/empleo/public/reporte1' || currentLocation == 'http://www.salamanca.gob.mx/empleo/public/reporte2') {
    $('#usuarios').children().css({ 'opacity' : 0.50 }).end().css({ 'opacity' : 0.50 });
    $('#vacantes').children().css({ 'opacity' : 0.50 }).end().css({ 'opacity' : 0.50 });
    $('#empresas').children().css({ 'opacity' : 0.50 }).end().css({ 'opacity' : 0.50 });
  }
  var url;

  var newStatus = function(){
      $('#dlg').dialog('open').dialog('center').dialog('setTitle','new status');
      $('#fm').form('clear');
      url = 'save_status';
  }

  var editStatus=function(){
      var row = $('#dg').datagrid('getSelected');
      if (row){
          $('#dlg').dialog('open').dialog('center').dialog('setTitle','edit status');
          $('#fm').form('load',row);
          url = 'update_status/'+row.id;
      }
  }
  var saveStatus=function(){
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
  var destroyStatus=function(){
      var row = $('#dg').datagrid('getSelected');
      if (row){
          $.messager.confirm('OMC Calibrations','destroy status?',function(r){
              if (r){
                  $.post('destroy_status',{id:row.id},function(result){
                      if (result.success){
                          $('#dg').datagrid('reload');    // reload the user data
                      } else {
                          $.messager.show({    // show error message
                              title: 'OMC Calibrations',
                              msg: result.errorMsg
                          });
                      }
                  },'json');
              }
          });
      }
  }

$('#newStatus').on('click', newStatus);
$('#saveStatus').on('click', saveStatus);
$('#editStatus').on('click', editStatus);
$('#destroyStatus').on('click', destroyStatus);


});
