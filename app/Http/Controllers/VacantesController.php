<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Vacantes;
use App\EstadosCivil;
use App\Experiencias;
use App\Escolaridades;
use App\Causas;
use App\Prestaciones;
use App\VacantePrestaciones;
use Auth;
use App\Municipios;
use App\Empresas;
use DateTime;

class VacantesController extends Controller
{
    public function index(){
      return view('vacantes');
    }

    public function get_vacantes(Request $request){
      // dd($request->all());
      $buscar=$request->buscar;
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

       $user=Auth::user();
       $empresa_id=$user->empresa_id;
       $nombreusuario=$user->name;
       if ($nombreusuario == 'Administrador') {
         if (empty($buscar)) {

                            $vacantes=DB::table('vacantes')->orderBy($sort, $order)
                                                  ->join('escolaridades','vacantes.escolaridad_id','=','escolaridades.id')
                                                  ->join('estados_civil','vacantes.estado_civil_id','=','estados_civil.id')
                                                  ->join('causas','vacantes.causa_id','=','causas.id')
                                                  ->join('experiencias','vacantes.experiencia_id','=','experiencias.id')
                                                  ->join('empresas','vacantes.empresa_id','=','empresas.id')
                                                  ->select('vacantes.id','vacantes.numero_vacante','vacantes.puesto','vacantes.salario','vacantes.numero_plazas','vacantes.edad','vacantes.habilidades','vacantes.pdf','vacantes.fecha_expiracion',
                                                  'escolaridades.escolaridad','estados_civil.estado_civil','causas.causa','experiencias.experiencia','vacantes.experiencia_id','vacantes.causa_id','vacantes.empresa_id','empresas.empresa','vacantes.estado_civil_id','vacantes.escolaridad_id','vacantes.experiencia_id','vacantes.causa_id')
                                                  ->skip($offset)->take($rows)
                                                  ->get();
                            }else {

                              $vacantes=DB::table('vacantes')->orderBy($sort, $order)
                                                   ->join('escolaridades','vacantes.escolaridad_id','=','escolaridades.id')
                                                   ->join('estados_civil','vacantes.estado_civil_id','=','estados_civil.id')
                                                   ->join('causas','vacantes.causa_id','=','causas.id')
                                                   ->join('experiencias','vacantes.experiencia_id','=','experiencias.id')
                                                   ->join('empresas','vacantes.empresa_id','=','empresas.id')
                                                   ->select('vacantes.id','vacantes.numero_vacante','vacantes.puesto','vacantes.salario','vacantes.numero_plazas','vacantes.edad','vacantes.habilidades','vacantes.pdf','vacantes.fecha_expiracion',
                                                   'escolaridades.escolaridad','estados_civil.estado_civil','causas.causa','experiencias.experiencia','vacantes.experiencia_id','vacantes.causa_id','vacantes.empresa_id','empresas.empresa','vacantes.estado_civil_id','vacantes.escolaridad_id','vacantes.experiencia_id','vacantes.causa_id')
                                                   ->where('vacantes.puesto','LIKE',"%{$buscar}%")
                                                   ->orWhere('vacantes.numero_vacante','LIKE',"%{$buscar}%")
                                                   ->skip($offset)->take($rows)
                                                   ->get();
                            }
                          }else {
         if(empty($buscar)) {
                            $vacantes=DB::table('vacantes')->orderBy($sort, $order)
                                                  ->join('escolaridades','vacantes.escolaridad_id','=','escolaridades.id')
                                                  ->join('estados_civil','vacantes.estado_civil_id','=','estados_civil.id')
                                                  ->join('causas','vacantes.causa_id','=','causas.id')
                                                  ->join('experiencias','vacantes.experiencia_id','=','experiencias.id')
                                                  ->join('empresas','vacantes.empresa_id','=','empresas.id')
                                                  ->select('vacantes.id','vacantes.numero_vacante','vacantes.puesto','vacantes.salario','vacantes.numero_plazas','vacantes.edad','vacantes.habilidades','vacantes.pdf','vacantes.fecha_expiracion',
                                                  'escolaridades.escolaridad','estados_civil.estado_civil','causas.causa','experiencias.experiencia','vacantes.experiencia_id','vacantes.causa_id','vacantes.empresa_id','empresas.empresa','vacantes.estado_civil_id','vacantes.escolaridad_id','vacantes.experiencia_id','vacantes.causa_id')
                                                  ->where('vacantes.empresa_id',$empresa_id)
                                                  ->skip($offset)->take($rows)
                                                  ->get();
                        }else {
                            $vacantes=DB::table('vacantes')->orderBy($sort, $order)
                                                  ->join('escolaridades','vacantes.escolaridad_id','=','escolaridades.id')
                                                  ->join('estados_civil','vacantes.estado_civil_id','=','estados_civil.id')
                                                  ->join('causas','vacantes.causa_id','=','causas.id')
                                                  ->join('experiencias','vacantes.experiencia_id','=','experiencias.id')
                                                  ->join('empresas','vacantes.empresa_id','=','empresas.id')
                                                  ->select('vacantes.id','vacantes.numero_vacante','vacantes.puesto','vacantes.salario','vacantes.numero_plazas','vacantes.edad','vacantes.habilidades','vacantes.pdf','vacantes.fecha_expiracion',
                                                  'escolaridades.escolaridad','estados_civil.estado_civil','causas.causa','experiencias.experiencia','vacantes.experiencia_id','vacantes.causa_id','vacantes.empresa_id','empresas.empresa','vacantes.estado_civil_id','vacantes.escolaridad_id','vacantes.experiencia_id','vacantes.causa_id')
                                                  ->where([['vacantes.empresa_id','=',$empresa_id],['vacantes.puesto','LIKE',"%{$buscar}%"]])
                                                  ->orWhere([['vacantes.empresa_id','=',$empresa_id],['vacantes.numero_vacante','LIKE',"%{$buscar}%"]])

                                                  ->skip($offset)->take($rows)
                                                  ->get();
              }
       }

       $items=array();
       foreach($vacantes as $vacante){
         array_push($items, $vacante);
       }
       $result["rows"]=$items;
       // $row=$profiles->toArray($profiles);
       echo json_encode($result);
    }

    public function get_estados_civil(Request $request){
      $estados=EstadosCivil::orderBy('id')->get();
      echo json_encode($estados);
    }

    public function get_escolaridades(Request $request){
      $escolaridades=Escolaridades::orderBy('id')->get();
      echo json_encode($escolaridades);
    }

    public function get_experiencias(Request $request){
      $experiencias=Experiencias::orderBy('id')->get();
      echo json_encode($experiencias);
    }

    public function get_causas(Request $request){
      $causas=Causas::orderBy('id')->get();
      echo json_encode($causas);
    }

    public function get_prestaciones(Request $request){
      $prestaciones=Prestaciones::orderBy('id')->get();
      echo json_encode($prestaciones);
    }

    public function get_empresas(Request $request){
      $empresas  = Empresas::orderBy('id')->get();
      echo json_encode($empresas);
    }



    public function save_vacantes(Request $request){
      $user=Auth::user();
      $empresa_id=$user->empresa_id;
      $pdf=$request->file('pdf');
      $name=$pdf->getClientOriginalName();
      $destinationPath=public_path('pdfs');
      $pdf->move($destinationPath,$name);

      $vacante = new Vacantes();
      $vacante->puesto=$request->puesto;
      $vacante->salario=$request->salario;
      $vacante->numero_plazas=$request->numero_plazas;
      $vacante->edad=$request->edad;
      $vacante->habilidades=$request->habilidades;
      $vacante->pdf=$name;
      $vacante->fecha_expiracion=$request->fecha_expiracion;
      $vacante->estado_civil_id=$request->estado_civil_id;
      $vacante->escolaridad_id=$request->escolaridad_id;
      $vacante->experiencia_id=$request->experiencia_id;
      $vacante->causa_id=$request->causa_id;
      if ($request->emp) {
        $vacante->empresa_id = $request->emp;
      }else {
        $vacante->empresa_id=$empresa_id;
      }
      $vacante->numero_vacante = $request->numero_vacante;
      $vacante->save();

      $prestacion=$request->prestaciones;
      $vacante_id= DB::table('vacantes')->max('id');
      if ($prestacion == "1" || $prestacion == "2" || $prestacion == "3") {
        $prestaciones = new VacantePrestaciones();
        $prestaciones->vacante_id=$vacante_id;
        $prestaciones->prestacion_id=$prestacion;
        $prestaciones->save();
        echo json_encode(array('success'=>true));
      }else {
        $pts=explode(",",$prestacion);
        for ($i=0; $i < sizeof($pts); $i++) {
          $id_prestacion=$pts[$i];
          $prestaciones = new VacantePrestaciones();
          $prestaciones->vacante_id=$vacante_id;
          $prestaciones->prestacion_id=$id_prestacion;
          $prestaciones->save();
        }
        echo json_encode(array('success'=>true));
      }
    }

    public function update_vacantes(Request $request, $id){

      $pdf=$request->file('pdf');
      if(empty($pdf)) {
        $vacante = Vacantes::find($id);
        $vacante->puesto= $request->puesto;
        $vacante->salario= $request->salario;
        $vacante->numero_plazas=$request->numero_plazas;
        $vacante->edad=$request->edad;
        $vacante->habilidades=$request->habilidades;
        $vacante->estado_civil_id=$request->estado_civil_id;
        $vacante->escolaridad_id=$request->escolaridad_id;
        $vacante->experiencia_id=$request->experiencia_id;
        $vacante->causa_id=$request->causa_id;
        $vacante->save();
        echo json_encode(array('success'=>true));

      }else {
        $name=$pdf->getClientOriginalName();
        $destinationPath=public_path('pdfs');
        $pdf->move($destinationPath,$name);
        $vacante = Vacantes::find($id);
        $vacante->puesto= $request->puesto;
        $vacante->salario= $request->salario;
        $vacante->numero_plazas=$request->numero_plazas;
        $vacante->edad=$request->edad;
        $vacante->habilidades=$request->habilidades;
        $vacante->pdf=$name;
        $vacante->estado_civil_id=$request->estado_civil_id;
        $vacante->escolaridad_id=$request->escolaridad_id;
        $vacante->experiencia_id=$request->experiencia_id;
        $vacante->causa_id=$request->causa_id;
        $vacante->save();
        echo json_encode(array('success'=>true));

      }

    }



    public function reporte_vacantes(){
      $meses=array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
      $meses_numero=[1,2,3,4,5,6,7,8,9,10,11,12];
      $fechainicial = new DateTime('2020-01-01');
      $fechafinal = new DateTime();
      $diferencia = $fechainicial->diff($fechafinal);
      $mes=( $diferencia->y * 12 ) + $diferencia->m;
      // dd($mes);

      $mesestranscurridos= [];
      $sumatoria=[];
      $datos=[];
      $user=Auth::user();
      for ($i=0; $i <= $mes ; $i++) {
        array_push($mesestranscurridos, $meses[$i]);
      }
      if ($user->name == "Administrador") {
        for ($i=0; $i <= $mes ; $i++) {
          $datos=Vacantes::whereMonth('created_at','=',$meses_numero[$i])->count();
          array_push($sumatoria, $datos);
        }
        $empresa="Bolsa de Empleo Salamanca, Gto.";
      }else{
        $empresa_id=$user->empresa_id;
        for($i=0; $i <= $mes ; $i++) {
          $datos=Vacantes::where('empresa_id',$empresa_id)->whereMonth('created_at','=',$meses_numero[$i])->count();
          array_push($sumatoria, $datos);
          $user=Auth::user();
          $empresa_id=$user->empresa_id;
          $emp=DB::table('empresas')->select('empresa')->where('id',$empresa_id)->get();
          $empresa=$emp[0]->empresa;
        }
      }



      $chart1 = \Chart::title([
        'text' => "$empresa",
    ])
    ->chart([
        'type'     => 'line', // pie , columnt ect
        'renderTo' => 'chart1', // render the chart into your div with id
    ])
    ->subtitle([
        'text' => 'Vacantes Registradas por Mes',
    ])
    ->colors([
        '#303030'
    ])
    ->xaxis([
        'categories' => $mesestranscurridos,
        'labels'     => [
            'rotation'  => 15,
            'align'     => 'top',
            'formatter' => 'startJs:function(){return this.value + " (2020)"}:endJs',
            // use 'startJs:yourjavasscripthere:endJs'
        ],
    ])
    ->yaxis([
        'text' => 'This Y Axis',
    ])
    ->legend([
        'layout'        => 'vertikal',
        'align'         => 'right',
        'verticalAlign' => 'middle',
    ])
    ->series(
        [
            [
                'name'  => 'Vacantes',
                'data'  => $sumatoria,
                // 'color' => '#0c2959',
            ],
        ]
    )
    ->display();

    return view('reportvacantes', [
        'chart1' => $chart1,
    ]);

    }

    public function reporte_vacantes_municipio(Request $request){
        $municipios=DB::table('vacantes')->orderBy('id','desc')
        ->join('empresas','vacantes.empresa_id','=','empresas.id')
        ->join('municipios','empresas.municipio_id','=','municipios.id')
        ->select('vacantes.id','vacantes.empresa_id','empresas.empresa','empresas.municipio_id','municipios.municipio')->groupBy('municipios.municipio')->get();
        $labels=[];
        $valores=[];
        for ($i=0; $i < count($municipios) ; $i++) {
          array_push($labels,$municipios[$i]->municipio);
          $contador= DB::table('vacantes')->orderBy('vacantes.id','desc')
              ->join('empresas','vacantes.empresa_id','=','empresas.id')
              ->select('vacantes.id','vacantes.empresa_id','empresas.municipio_id')
              ->where('empresas.municipio_id','=',$municipios[$i]->municipio_id)->count();
              array_push($valores,$contador);
        }

              $chart1 = \Chart::title([
                'text' => "Bolsa de Empleo Salamanca,Gto",
            ])
            ->chart([
                'type'     => 'line', // pie , columnt ect
                'renderTo' => 'chart1', // render the chart into your div with id
            ])
            ->subtitle([
                'text' => 'Vacantes Registradas por Municipio',
            ])
            ->colors([
                '#303030'
            ])
            ->xaxis([
                'categories' => $labels,
                'labels'     => [
                    'rotation'  => 15,
                    'align'     => 'top',
                    'formatter' => 'startJs:function(){return this.value + " (2019)"}:endJs',
                    // use 'startJs:yourjavasscripthere:endJs'
                ],
            ])
            ->yaxis([
                'text' => 'This Y Axis',
            ])
            ->legend([
                'layout'        => 'vertikal',
                'align'         => 'right',
                'verticalAlign' => 'middle',
            ])
            ->series(
                [
                    [
                        'name'  => 'Vacantes',
                        'data'  => $valores,
                        'color' => '#62243e',
                    ],
                ]
            )
            ->display();

            return view('vacantesmunicipio', [
                'chart1' => $chart1,
            ]);



    }

    public function buscarvacante(Request $request){
      $puesto=$request->puesto;
      $ubicacion=$request->Ubicacion;
      if (empty($puesto) && empty($ubicacion)) {

        $vacantes=DB::table('vacantes')->orderBy('id','desc')
                             ->join('escolaridades','vacantes.escolaridad_id','=','escolaridades.id')
                             ->join('estados_civil','vacantes.estado_civil_id','=','estados_civil.id')
                             ->join('causas','vacantes.causa_id','=','causas.id')
                             ->join('experiencias','vacantes.experiencia_id','=','experiencias.id')
                             ->join('empresas','vacantes.empresa_id','=','empresas.id')
                             ->join('municipios','empresas.municipio_id','=','municipios.id')
                             ->select('vacantes.id','vacantes.puesto','vacantes.salario','vacantes.numero_plazas','vacantes.edad','vacantes.habilidades','vacantes.pdf',
                             'escolaridades.escolaridad','estados_civil.estado_civil','causas.causa','experiencias.experiencia','vacantes.experiencia_id','vacantes.causa_id','empresas.empresa','empresas.logo','empresas.municipio_id','municipios.municipio')->paginate(10);
        }else {
        $vacantes=DB::table('vacantes')->orderBy('id','desc')
                             ->join('escolaridades','vacantes.escolaridad_id','=','escolaridades.id')
                             ->join('estados_civil','vacantes.estado_civil_id','=','estados_civil.id')
                             ->join('causas','vacantes.causa_id','=','causas.id')
                             ->join('experiencias','vacantes.experiencia_id','=','experiencias.id')
                             ->join('empresas','vacantes.empresa_id','=','empresas.id')
                             ->join('municipios','empresas.municipio_id','=','municipios.id')
                             ->select('vacantes.id','vacantes.puesto','vacantes.salario','vacantes.numero_plazas','vacantes.edad','vacantes.habilidades','vacantes.pdf',
                             'escolaridades.escolaridad','estados_civil.estado_civil','causas.causa','experiencias.experiencia','vacantes.experiencia_id','vacantes.causa_id','empresas.empresa','empresas.logo','empresas.municipio_id','municipios.municipio')
                             ->where('vacantes.puesto','LIKE', "%{$puesto}%")
                             ->orWhere('empresas.municipio_id', $ubicacion)->paginate(10);
                           }
      return view('listavacantes', ['vacantes'=>$vacantes]);

    }

    public function get_numero_vacante(Request $request){
      $vacante = Vacantes::orderBy('id','desc')->select('numero_vacante')->first();
      return $vacante;
    }
}
