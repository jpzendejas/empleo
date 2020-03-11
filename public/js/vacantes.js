$(document).ready(function(){
  var url;
  var numero_vacante;
  var newVacante = function(){
      $.ajax({
        type:'GET',
        url:'/empleo/public/get_numero_vacantes',
        dataType:'json',
        success: function(data){
          var num_vac = data.numero_vacante;
          var number_split = num_vac.split('-');
          var number = parseInt(number_split[1]);
          var new_number= number + 1;
          var nuevo_numero = new_number.toString().padStart(4,"0");
          numero_vacante = 'VA-'+nuevo_numero;
          $('#numero_vacante').textbox('setValue', numero_vacante );
        }
      });
      $('#dlg').dialog('open').dialog('center').dialog('setTitle','Nueva Vacante');
      $('#fm').form('clear');
      $('#emp').combobox({
        url:'get_empresas_admin',
        valueField:'id',
        textField:'empresa'
      });
      $('#ec').combobox({
        url:'get_estado_civil',
        valueField:'id',
        textField:'estado_civil'
      });
      $('#es').combobox({
        url:'get_escolaridad',
        valueField:'id',
        textField:'escolaridad'
      });
      $('#ex').combobox({
        url:'get_experiencia',
        valueField:'id',
        textField:'experiencia'
      });
      $('#ca').combobox({
        url:'get_causa',
        valueField:'id',
        textField:'causa'
      });
      $('#dl').datalist({
        url: 'get_prestacion',
        checkbox: true,
        lines: true,
        singleSelect:false,
        valueField:'id',
        textField:'prestacion',
        onSelect: function(rowIndex, rowData){
          // alert(rowData);
          // console.log(rowData.id);
          var ids = [];
          var rows = $('#dl').datalist('getSelections');
          for(var i=0; i<rows.length; i++){
            ids.push(rows[i].id);
            $('#pr').val(ids);
          }
          console.log(ids);
          if (rows.length == 1) {

          }
          // alert(ids.join('\n'));
        }
      });
      $('#fe').datebox({
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
      url = 'save_vacante';
  }
  var editVacante=function(){
      var row = $('#dg').datagrid('getSelected');
      if (row){
          $('#dlg').dialog('open').dialog('center').dialog('setTitle','Editar Vacante');
          $('#fm').form('load',row);
          $('#pdf').filebox({
            required:false
          });
          $('#ec').combobox({
            url:'get_estado_civil',
            valueField:'id',
            textField:'estado_civil',
            value: row.estado_civil_id
          });
          $('#es').combobox({
            url:'get_escolaridad',
            valueField:'id',
            textField:'escolaridad',
            value: row.escolaridad_id
          });
          $('#ex').combobox({
            url:'get_experiencia',
            valueField:'id',
            textField:'experiencia',
            value: row.experiencia_id
          });
          $('#ca').combobox({
            url:'get_causa',
            valueField:'id',
            textField:'causa',
            value: row.causa_id
          });
          $('#fe').datebox({
            formatter: function(fecha_expiracion){
              var y=fecha_expiracion.getFullYear();
              var m=fecha_expiracion.getMonth()+1;
              var d=fecha_expiracion.getDate();
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
          $('#id').hide();
          $('#sp').hide();
          url = 'update_vacante/'+row.id;
      }
  }
  var saveVacante=function(){
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
  var destroyVacante=function(){
      var row = $('#dg').datagrid('getSelected');
      if (row){
          $.messager.confirm('Bolsa de Empleo Salamanca','Eliminar Vacante?',function(r){
              if (r){
                  $.post('destroy_vacante',{id:row.id},function(result){
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
  var exportarVacante =function(){
    $('#dg').datagrid('toExcel','vacantes.xls');
  }
  var buscarVacante = function(){
    $('#dg').datagrid('load',{
        buscar: $('#buscar').val(),
    });

  }


$('#newVacante').on('click', newVacante);
$('#saveVacante').on('click', saveVacante);
$('#editVacante').on('click', editVacante);
$('#destroyVacante').on('click', destroyVacante);
$('#exportarVacante').on('click', exportarVacante);
$('#bs').on('click', buscarVacante);
});
