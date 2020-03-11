<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Status;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('cat_status');
        //
    }

    public function get_status(Request $request){
        $page= isset($_POST['page']) ? intval($_POST['page']):1;
       $rows= isset($_POST['rows']) ? intval($_POST['rows']):10;
       $offset = ($page-1)*$rows;
       $sql="select count(*) from status";

       $host=config('database.connections.mysql.host');
       $username=config('database.connections.mysql.username');
       $password=config('database.connections.mysql.password');
       $db_name=config('database.connections.mysql.database');
       $connection=mysqli_connect("$host","$username","$password") or die("cannot connect server");
       $database=mysqli_select_db($connection,"$db_name") or die("cannot select db");
       $rs=mysqli_query($connection,$sql);
       $row=mysqli_fetch_row($rs);
       $result["total"]= $row[0];

       $status=Status::orderBy('id','asc')->skip($offset)->take($rows)->get();
       $items=array();
       foreach($status as $st){
         array_push($items, $st);
       }
       $result["rows"]=$items;
       // $row=$profiles->toArray($profiles);
       echo json_encode($result);
     }

     public function save_status(Request $request){
       $st= new Status();
       $st->status_name=$request->status_name;
       $st->save();
       echo json_encode(array('success'=>true));
     }

     public function update_status(Request $request, $id){
       $requestData=$request->all();
       $st=Status::findOrfail($id);
       $st->update($requestData);

       echo json_encode(array('success'=>true));
     }

     public function destroy_status(Request $request){
       Status::destroy($request->id);
       echo json_encode(array('success'=>true));
     }



    }
