<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Estados;
use App\Municipios;
use App\Sectores;
use App\Empresas;

class EmpresasController extends Controller
{
    public function index(){
      return view('empresas');
    }

    public function get_empresas(Request $request){
      $page= isset($_POST['page']) ? intval($_POST['page']):1;
       $rows= isset($_POST['rows']) ? intval($_POST['rows']):10;
       $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id';
       $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
       $offset = ($page-1)*$rows;
       $sql="select count(*) from empresas";

       $host=config('database.connections.mysql.host');
       $username=config('database.connections.mysql.username');
       $password=config('database.connections.mysql.password');
       $db_name=config('database.connections.mysql.database');
       $connection=mysqli_connect("$host","$username","$password") or die("cannot connect server");
       $database=mysqli_select_db($connection,"$db_name") or die("cannot select db");
       $rs=mysqli_query($connection,$sql);
       $row=mysqli_fetch_row($rs);
       $result["total"]= $row[0];

       // $empresas=Status::orderBy('id','asc')->skip($offset)->take($rows)->get();

       $empresas=DB::table('empresas')->orderBy($sort, $order)
                            ->join('municipios','empresas.municipio_id','=','municipios.id')
                            ->join('sectores','empresas.sector_id','=','sectores.id')
                            ->join('estados','municipios.estado_id','=','estados.id')
                            ->select('empresas.id','empresas.empresa','empresas.numero_empleados','empresas.direccion',
                            'empresas.colonia','empresas.rfc','empresas.codigo_postal','empresas.telefono','empresas.correo_electronico','empresas.logo','empresas.sector_id','empresas.municipio_id','municipios.municipio','municipios.estado_id','sectores.sector','estados.estado')
                            ->skip($offset)->take($rows)
                            ->get();
       $items=array();
       foreach($empresas as $empresa){
         array_push($items, $empresa);
       }
       $result["rows"]=$items;
       // $row=$profiles->toArray($profiles);
       echo json_encode($result);
    }

    public function get_estados(){
    $estados=Estados::orderBy('id','desc')->get();
    $row=$estados->toArray();
    echo json_encode($estados);
    }

    public function get_municipios(Request $request, $id){
      $municipios=Municipios::where('estado_id',$id)->get();
      echo json_encode($municipios);
    }

    public function get_sectores(Request $request){
      $sectores=Sectores::orderBy('id')->get();
      echo json_encode($sectores);
    }

    public function save_empresas(Request $request){
      $logo=$request->file('logo');
      $name=$logo->getClientOriginalName();
      $destinationPath=public_path('logos');
      $logo->move($destinationPath,$name);

      $empresa = new Empresas();
      $empresa->empresa=$request->empresa;
      $empresa->numero_empleados=$request->numero_empleados;
      $empresa->direccion=$request->direccion;
      $empresa->colonia=$request->colonia;
      $empresa->rfc=$request->rfc;
      $empresa->codigo_postal=$request->codigo_postal;
      $empresa->telefono=$request->telefono;
      $empresa->correo_electronico=$request->correo_electronico;
      $empresa->logo=$name;
      $empresa->municipio_id=$request->municipio_id;
      $empresa->sector_id=$request->sector_id;
      $empresa->save();
      echo json_encode(array('success'=>true));
    }

    public function update_empresas(Request $request, $id){
    $requestData=$request->all();
    $empresa=Empresas::findOrfail($id);
    $empresa->update($requestData);
    echo json_encode(array('success'=>true));
    }
}
