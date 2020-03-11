<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Galerias;
use Auth;

class GaleriasController extends Controller
{
    public function index(Request $request){
      return view('admingalerias');
    }

    public function get_galerias(Request $request){

      $page= isset($_POST['page']) ? intval($_POST['page']):1;
       $rows= isset($_POST['rows']) ? intval($_POST['rows']):10;
       $offset = ($page-1)*$rows;
       $sql="select count(*) from galerias";

       $host=config('database.connections.mysql.host');
       $username=config('database.connections.mysql.username');
       $password=config('database.connections.mysql.password');
       $db_name=config('database.connections.mysql.database');
       $connection=mysqli_connect("$host","$username","$password") or die("cannot connect server");
       $database=mysqli_select_db($connection,"$db_name") or die("cannot select db");
       $rs=mysqli_query($connection,$sql);
       $row=mysqli_fetch_row($rs);
       $result["total"]= $row[0];

       $galerias=Galerias::orderBy('id','asc')->skip($offset)->take($rows)->get();
       $items=array();
       foreach($galerias as $galeria){
         array_push($items, $galeria);
       }
       $result["rows"]=$items;
       echo json_encode($result);
    }

    public function save_galerias(Request $request){
      $user=Auth::user();
      $usuario_id=$user->id;

      $img=$request->file('img');
      $nombre=$img->getClientOriginalName();
      $destinationPath=public_path('galeria');
      $img->move($destinationPath,$nombre);

      $galeria = new Galerias();
      $galeria->titulo=$request->titulo;
      $galeria->descripcion=$request->descripcion;
      $galeria->img=$nombre;
      $galeria->fecha_expiracion=$request->fecha_expiracion;
      $galeria->usuario_id=$usuario_id;
      $galeria->save();
      echo json_encode(array('success'=>true));

    }


}
