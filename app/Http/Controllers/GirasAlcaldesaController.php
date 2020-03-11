<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Status;
use DB;

class GirasAlcaldesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('giras_alcaldesa');
        //
    }

    public function get_vacantes(Request $request){
      $buscarinformacion=$request->buscarinformacion;
      $page= isset($_POST['page']) ? intval($_POST['page']):1;
       $rows= isset($_POST['rows']) ? intval($_POST['rows']):10;
       $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id';
       $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
       $offset = ($page-1)*$rows;
       $sql="select count(*) from vacantes";

       $host=config('database.connections.mysql.host');
       $username=config('database.connections.mysql.username');
       $password=config('database.connections.mysql.password');
       $db_name=config('database.connections.mysql.database');
       $connection=mysqli_connect("$host","$username","$password") or die("cannot connect server");
       $database=mysqli_select_db($connection,"$db_name") or die("cannot select db");
       $rs=mysqli_query($connection,$sql);
       $row=mysqli_fetch_row($rs);
       $result["total"]= $row[0];

       if(empty($buscarinformacion)) {
         $empresas=DB::table('empresas')->orderBy($sort, $order)
                            ->join('vacantes','vacantes.empresa_id','=','empresas.id')
                            ->select('empresas.id','empresas.empresa','empresas.telefono','empresas.direccion','empresas.colonia','empresas.correo_electronico','vacantes.numero_vacante','vacantes.puesto')
                            ->skip($offset)->take($rows)
                            ->get();
       }else {
         $empresas=DB::table('empresas')->orderBy($sort, $order)
                            ->join('vacantes','vacantes.empresa_id','=','empresas.id')
                            ->select('empresas.id','empresas.empresa','empresas.telefono','empresas.direccion','empresas.colonia','empresas.correo_electronico','vacantes.numero_vacante','vacantes.puesto')
                            ->where('vacantes.puesto','LIKE',"%{$buscarinformacion}%")
                            ->orWhere('vacantes.numero_vacante','LIKE',"%{$buscarinformacion}%")
                            ->orWhere('empresas.empresa','LIKE',"%{$buscarinformacion}%")
                            ->skip($offset)->take($rows)
                            ->get();
                          }

        $items=array();
        foreach($empresas as $empresa){
        array_push($items, $empresa);
        }
        $result["rows"]=$items;
        // $row=$profiles->toArray($profiles);
        echo json_encode($result);
     }





    }
