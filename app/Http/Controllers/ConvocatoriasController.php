<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Convocatorias;
use Auth;

class ConvocatoriasController extends Controller
{
    public function index(){
      return view('elementos');
    }

    public function get_convocatorias(Request $request){

     $page= isset($_POST['page']) ? intval($_POST['page']):1;
     $rows= isset($_POST['rows']) ? intval($_POST['rows']):10;
     $offset = ($page-1)*$rows;
     $sql="select count(*) from convocatorias";

     $host=config('database.connections.mysql.host');
     $username=config('database.connections.mysql.username');
     $password=config('database.connections.mysql.password');
     $db_name=config('database.connections.mysql.database');
     $connection=mysqli_connect("$host","$username","$password") or die("cannot connect server");
     $database=mysqli_select_db($connection,"$db_name") or die("cannot select db");
     $rs=mysqli_query($connection,$sql);
     $row=mysqli_fetch_row($rs);
     $result["total"]= $row[0];

     $convocatorias=Convocatorias::orderBy('id','asc')->skip($offset)->take($rows)->get();
     $items=array();
     foreach($convocatorias as $convocatoria){
       array_push($items, $convocatoria);
     }
     $result["rows"]=$items;
     // $row=$profiles->toArray($profiles);
     echo json_encode($result);
    }

    public function save_convocatorias(Request $request){
      $user=Auth::user();
      $usuario_id=$user->id;

      $imagen=$request->file('imagen');
      $nombre=$imagen->getClientOriginalName();
      $destinationPath=public_path('elementos');
      $imagen->move($destinationPath,$nombre);

      $convocatoria = new Convocatorias();
      $convocatoria->titulo=$request->titulo;
      $convocatoria->imagen=$nombre;
      $convocatoria->fecha_expiracion=$request->fecha_expiracion;
      $convocatoria->usuario_id=$usuario_id;
      $convocatoria->save();
      echo json_encode(array('success'=>true));
    }

    public function update_convocatorias(Request $request, $id){
      $imagen=$request->file('imagen');
      if(empty($imagen)) {
        $convocatoria = Convocatorias::find($id);
        $convocatoria->titulo= $request->titulo;
        $convocatoria->fecha_expiracion= $request->fecha_expiracion;
        $convocatoria->save();
        echo json_encode(array('success'=>true));
      }else {
        $nombre=$imagen->getClientOriginalName();
        $destinationPath=public_path('elementos');
        $imagen->move($destinationPath,$nombre);
        $convocatoria = Convocatorias::find($id);
        $convocatoria->titulo= $request->titulo;
        $convocatoria->imagen= $nombre;
        $convocatoria->fecha_expiracion= $request->fecha_expiracion;
        $convocatoria->save();
        echo json_encode(array('success'=>true));
      }
    }

    public function destroy_convocatorias(Request $request){
      Convocatorias::destroy($request->id);
      echo json_encode(array('success'=>true));
    }


}
