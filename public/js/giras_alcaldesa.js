$(document).ready(function(){
  var url;

var exportarInformacion = function(){
  $('#dg-giras').datagrid('print','vacantes.xls');
}
var buscarInformacion = function(){

  $('#dg-giras').datagrid('load',{
      buscarinformacion: $('#buscarinformacion').val(),
  });
}
$('#exportarInformacion').on('click', exportarInformacion);
$('#bsinformacion').on('click', buscarInformacion);
});
