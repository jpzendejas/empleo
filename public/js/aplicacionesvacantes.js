$(document).ready(function(){
  var url;
  var date = new Date();
  var res = date.toISOString().slice(0,10);
//   $('#dgas').datagrid({
//     rowStyler:function(index,row){
//         if (res == row.fecha_aplicacion){
//             return 'background-color:lightgreen;color:black;font-weight:bold;';
//         }else {
//             return 'background-color:lightyellow;color:black;font-weight:bold;';
//         }
//     }
// });

$('#dgas').datagrid({
  onClickRow: function(index, row){

  }
});
$('#dgas').datagrid({
    rowStyler:function(index,row){
        if (row.estatus == "DESCARTADO"){
            return 'background-color:pink;color:black;font-weight:bold;';
        }else if (row.estatus == "NUEVO") {
          return 'background-color:lightgreen;color:black;font-weight:bold;';
        }else if (row.estatus == "DISPONIBLE") {
          return 'background-color:lightyellow;color:black;font-weight:bold;';
        }else if (row.estatus == "RECLUTADO") {
          return 'background-color:#adc9c7;color:black;font-weight:bold;';
        }
    }
});
$('#dgas').datagrid({
	onDblClickRow:function(value,row){
		var url="/cvs/"+row.cv;
    // alert(url)
    document.getElementById('my_iframe').href = url;
    var obj=document.getElementById('my_iframe');
    obj.click();
	}
});
  var newEmpresa = function(){
      $('#dlg').dialog('open').dialog('center').dialog('setTitle','Nueva Empresa');
      $('#fm').form('clear');
      $('#est').combobox({
        url:'/get_estado',
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
        url:'/get_sector',
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
            url:'/get_estado',
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
            url:'/get_sector',
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
  var buscarVacante = function(){
    $('#dg').datagrid('load',{
      buscar: $('#buscar').val(),
    });
  }

  var verAplicacion = function(){
    var row = $('#dgas').datagrid('getSelected');
    if (row) {
    $('#dlgv').dialog('open');
    $("#nombre").text("Nombre: "+row.nombre);
    $("#apellidos").text("Apellidos: "+row.apellidos);
    $("#genero").text("Género: "+row.genero);
    $("#edad").text("Edad: "+row.edad);
    $("#escolaridad").text("Escolaridad: "+row.escolaridad);
    $("#telefono").text("Telefono: "+row.telefono);
    $("#correo").text("Correo Electrónico: "+row.correo);
    $("#vacante").text("Vacante: "+row.puesto);
    $("#fecha").text("Fecha de Aplicación: "+row.fecha_aplicacion);
    $("#cv").text("CV: "+row.cv);
    var a = document.getElementById('cv');
    a.href = "cvs/"+row.cv;
    if (row.estatus == "RECLUTADO") {
      $('#reclutar').hide();
    }
    else if (row.estatus == "DISPONIBLE") {
      $('#disponible').hide();
    }
    else if (row.estatus == "DESCARTADO") {
      $('#descartar').hide();


    }
  }
  }

var descartarAplicacion = function(){
  var row = $('#dgas').datagrid('getSelected');
  if (row){
      $.messager.confirm('Bolsa de Empleo Salamanca','Descartar Aplicación?',function(r){
          if (r){
              $.post('descartar_aplicacion',{id:row.id},function(result){
                  if (result.success){
                      $('#dgas').datagrid('reload');// reload the user data
                      location.reload();

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
var reclutarAplicacion = function(){
  var row = $('#dgas').datagrid('getSelected');
  if (row){
      $.messager.confirm('Bolsa de Empleo Salamanca','Reclutar Aplicación?',function(r){
          if (r){
              $.post('reclutar_aplicacion',{id:row.id},function(result){
                  if (result.success){
                      $('#dgas').datagrid('reload');
                      location.reload();

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
var disponibleAplicacion = function(){

  var row = $('#dgas').datagrid('getSelected');
  if (row){
      $.messager.confirm('Bolsa de Empleo Salamanca','Aplicación Disponible?',function(r){
          if (r){
              $.post('disponible_aplicacion',{id:row.id},function(result){
                  if (result.success){
                      $('#dgas').datagrid('reload');
                      location.reload();

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
$('#verAplicacion').on('click', verAplicacion);
$('#bs').on('click', buscarVacante);
$('#reclutar').on('click', reclutarAplicacion);
$('#disponible').on('click', disponibleAplicacion);
$('#descartar').on('click',descartarAplicacion);
$('#reclutar').on('click', reclutarAplicacion);
$('#disponible').on('click',disponibleAplicacion);

});
