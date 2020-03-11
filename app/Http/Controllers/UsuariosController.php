<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Empresas;
use App\Usuarios;

class UsuariosController extends Controller
{
    public function index(){
      return view('usuarios');
    }

    public function get_usuarios(Request $request){
      $page= isset($_POST['page']) ? intval($_POST['page']):1;
       $rows= isset($_POST['rows']) ? intval($_POST['rows']):10;
       $offset = ($page-1)*$rows;
       $sql="select count(*) from users";

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

       $usuarios=DB::table('users')->orderBy('id')
                            ->join('empresas','empresas.id','=','users.empresa_id')
                            ->select('users.id','users.name','users.email','users.password','users.empresa_id','empresas.empresa')
                            ->skip($offset)->take($rows)
                            ->get();
       $items=array();
       foreach($usuarios as $usuario){
         array_push($items, $usuario);
       }
       $result["rows"]=$items;
       // $row=$profiles->toArray($profiles);
       echo json_encode($result);
    }
    public function get_emps(Request $request){
      $empresas=Empresas::orderBy('id','desc')->get();
      $row=$empresas->toArray();
      echo json_encode($empresas);
    }
    public function save_usuarios(Request $request){
      $usuario = new Usuarios();
      $usuario->name=$request->name;
      $usuario->email=$request->email;
      $usuario->password=bcrypt($request->contraseña);
      $usuario->empresa_id=$request->empresa_id;
      $usuario->save();
      echo json_encode(array('success'=>true));
    }
    public function update_usuarios(Request $request, $id){
      $requestData=$request->all();
      $usuario=Usuarios::findOrfail($id);
      $usuario->update($requestData);
      echo json_encode(array('success'=>true));
    }

    public function destroy_usuarios(Request $request){
      $usuario=Usuarios::findOrfail($request->id);
      $usuario->destroy($request->id);
      echo json_encode(array('success'=>true));


    }
}
