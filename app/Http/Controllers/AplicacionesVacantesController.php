<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\AplicacionesVacantes;
use Input;
use DB;
use Auth;
use App\EstatusAplicaciones;
class AplicacionesVacantesController extends Controller
{
    public function save_aplicacion(Request $request){
      $fecha=date('Y-m-d');
      if($pdf=$request->file('cv')) {
        $nombre=$pdf->getClientOriginalName();
        $pdf->move('cvs', $nombre);
      }
      $aplicacion = new AplicacionesVacantes();
      $aplicacion->nombre=$request->nombre;
      $aplicacion->apellidos=$request->apellidos;
      $aplicacion->edad=$request->edad;
      $aplicacion->genero=$request->genero;
      $aplicacion->telefono=$request->telefono;
      $aplicacion->correo=$request->correo;
      $aplicacion->cv=$nombre;
      $aplicacion->fecha_aplicacion=$fecha;
      $aplicacion->vacante_id=$request->vacante_id;
      $aplicacion->escolaridad_id=$request->escolaridad_id;
      $aplicacion->save();

      return redirect()->back()->with('message', 'APLICACIÓN CORRECTA A LA VACANTE!');
    }
    public function index(){
      return view('aplicacionesvacantes');
    }

    public function get_aplicaciones(Request $request){

      $buscar=$request->buscar;
      $user=Auth::user();
      $empresa_id=$user->empresa_id;

      $page= isset($_POST['page']) ? intval($_POST['page']):1;
      $rows= isset($_POST['rows']) ? intval($_POST['rows']):10;
      $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'aplicaciones_vacantes.id';
      $order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';

      $offset = ($page-1)*$rows;
      $sql="select count(*) from aplicaciones_vacantes";

      $host=config('database.connections.mysql.host');
      $username=config('database.connections.mysql.username');
      $password=config('database.connections.mysql.password');
      $db_name=config('database.connections.mysql.database');
      $connection=mysqli_connect("$host","$username","$password") or die("cannot connect server");
      $database=mysqli_select_db($connection,"$db_name") or die("cannot select db");
      $rs=mysqli_query($connection,$sql);
      $row=mysqli_fetch_row($rs);
      $result["total"]= $row[0];
      if (empty($buscar)) {
        $aplicaciones=DB::table('aplicaciones_vacantes')->orderBy($sort, $order)
        ->join('escolaridades','aplicaciones_vacantes.escolaridad_id','=','escolaridades.id')
        ->join('vacantes','aplicaciones_vacantes.vacante_id','=','vacantes.id')
        ->join('empresas','vacantes.empresa_id','=','empresas.id')
        ->join('estatus_aplicaciones','aplicaciones_vacantes.estatus_aplicacion_id','=','estatus_aplicaciones.id')
        ->select('aplicaciones_vacantes.id','aplicaciones_vacantes.nombre','aplicaciones_vacantes.apellidos','aplicaciones_vacantes.edad','aplicaciones_vacantes.genero','aplicaciones_vacantes.telefono',
        'aplicaciones_vacantes.correo','aplicaciones_vacantes.cv','aplicaciones_vacantes.fecha_aplicacion','aplicaciones_vacantes.vacante_id','aplicaciones_vacantes.escolaridad_id','aplicaciones_vacantes.estatus_aplicacion_id','escolaridades.escolaridad','vacantes.puesto','empresas.empresa','estatus_aplicaciones.estatus')
        ->where('empresa_id',$empresa_id)->skip($offset)->take($rows)->get();
      }else {
        $aplicaciones=DB::table('aplicaciones_vacantes')->orderBy($sort, $order)
        ->join('escolaridades','aplicaciones_vacantes.escolaridad_id','=','escolaridades.id')
        ->join('vacantes','aplicaciones_vacantes.vacante_id','=','vacantes.id')
        ->join('empresas','vacantes.empresa_id','=','empresas.id')
        ->select('aplicaciones_vacantes.nombre','aplicaciones_vacantes.apellidos','aplicaciones_vacantes.edad','aplicaciones_vacantes.genero','aplicaciones_vacantes.telefono',
        'aplicaciones_vacantes.correo','aplicaciones_vacantes.cv','aplicaciones_vacantes.fecha_aplicacion','aplicaciones_vacantes.vacante_id','aplicaciones_vacantes.escolaridad_id','escolaridades.escolaridad','vacantes.puesto','empresas.empresa')
        ->where([['empresa_id','=',$empresa_id],['vacantes.puesto','LIKE',"%{$buscar}%"]])->skip($offset)->take($rows)->get();
      }
      // $aplicaciones=AplicacionesVacantes::orderBy('id','asc')->skip($offset)->take($rows)->get();
      $items=array();
      foreach($aplicaciones as $aplicacion){
        array_push($items, $aplicacion);
      }
      $result["rows"]=$items;
      echo json_encode($result);

    }

    public function descartar_aplicaciones(Request $request){
      $estatus=EstatusAplicaciones::orderBy('id')->where('estatus',"DESCARTADO")->first();
      $aplicacion=AplicacionesVacantes::find($request->id);
      $aplicacion->estatus_aplicacion_id=$estatus->id;
      $aplicacion->save();
      echo json_encode(array('success'=>true));
    }

    public function disponible_aplicaciones(Request $request){
      $estatus=EstatusAplicaciones::orderBy('id')->where('estatus',"DISPONIBLE")->first();
      $aplicacion=AplicacionesVacantes::find($request->id);
      $aplicacion->estatus_aplicacion_id=$estatus->id;
      $aplicacion->save();
      echo json_encode(array('success'=>true));
    }

    public function reclutar_aplicaciones(Request $request){
      $estatus=EstatusAplicaciones::orderBy('id')->where('estatus',"RECLUTADO")->first();
      $aplicacion=AplicacionesVacantes::find($request->id);
      $aplicacion->estatus_aplicacion_id=$estatus->id;
      $aplicacion->save();
      echo json_encode(array('success'=>true));
    }
}
