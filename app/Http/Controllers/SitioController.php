<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Municipios;
use DB;
use App\EstadosCivil;
use App\Escolaridades;
use App\Vacantes;


class SitioController extends Controller
{
    public function index(Request $request){
      return view('index');
    }

    public function search(Request $request){
      $vacantes = Vacantes::orderBy('id')->get();
      $municipios=Municipios::orderBy('id')->get();
      return view('search')->with('municipios', $municipios)->with('vacantes', $vacantes);
    }

    public function buscarvacante(Request $request){
      $puesto=$request->puesto;
      $ubicacion=$request->Ubicacion;
      if ($puesto == "" and $ubicacion == "") {
        $vacantes=DB::table('vacantes')->orderBy('id','desc')
                             ->join('escolaridades','vacantes.escolaridad_id','=','escolaridades.id')
                             ->join('estados_civil','vacantes.estado_civil_id','=','estados_civil.id')
                             ->join('causas','vacantes.causa_id','=','causas.id')
                             ->join('experiencias','vacantes.experiencia_id','=','experiencias.id')
                             ->join('empresas','vacantes.empresa_id','=','empresas.id')
                             ->join('municipios','empresas.municipio_id','=','municipios.id')
                             ->select('vacantes.id','vacantes.puesto','vacantes.salario','vacantes.numero_plazas','vacantes.edad','vacantes.habilidades','vacantes.pdf',
                             'escolaridades.escolaridad','estados_civil.estado_civil','causas.causa','experiencias.experiencia','vacantes.experiencia_id','vacantes.causa_id','empresas.empresa','empresas.logo','empresas.municipio_id','municipios.municipio')->paginate(10);
                           }elseif (empty($puesto)){
                             $vacantes=DB::table('vacantes')->orderBy('id','desc')
                             ->join('escolaridades','vacantes.escolaridad_id','=','escolaridades.id')
                             ->join('estados_civil','vacantes.estado_civil_id','=','estados_civil.id')
                             ->join('causas','vacantes.causa_id','=','causas.id')
                             ->join('experiencias','vacantes.experiencia_id','=','experiencias.id')
                             ->join('empresas','vacantes.empresa_id','=','empresas.id')
                             ->join('municipios','empresas.municipio_id','=','municipios.id')
                             ->select('vacantes.id','vacantes.puesto','vacantes.salario','vacantes.numero_plazas','vacantes.edad','vacantes.habilidades','vacantes.pdf',
                             'escolaridades.escolaridad','estados_civil.estado_civil','causas.causa','experiencias.experiencia','vacantes.experiencia_id','vacantes.causa_id','empresas.empresa','empresas.logo','empresas.municipio_id','municipios.municipio')
                             ->where('empresas.municipio_id','=',$ubicacion)->paginate(10);
                           }
                           elseif (empty($ubicacion)) {
                             $vacantes=DB::table('vacantes')->orderBy('id','desc')
                                                  ->join('escolaridades','vacantes.escolaridad_id','=','escolaridades.id')
                                                  ->join('estados_civil','vacantes.estado_civil_id','=','estados_civil.id')
                                                  ->join('causas','vacantes.causa_id','=','causas.id')
                                                  ->join('experiencias','vacantes.experiencia_id','=','experiencias.id')
                                                  ->join('empresas','vacantes.empresa_id','=','empresas.id')
                                                  ->join('municipios','empresas.municipio_id','=','municipios.id')
                                                  ->select('vacantes.id','vacantes.puesto','vacantes.salario','vacantes.numero_plazas','vacantes.edad','vacantes.habilidades','vacantes.pdf',
                                                  'escolaridades.escolaridad','estados_civil.estado_civil','causas.causa','experiencias.experiencia','vacantes.experiencia_id','vacantes.causa_id','empresas.empresa','empresas.logo','empresas.municipio_id','municipios.municipio')
                                                  ->where('vacantes.puesto','LIKE', "%{$puesto}%")->paginate(10);
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
                                                  ->where([['vacantes.puesto','LIKE', "%{$puesto}%"],['empresas.municipio_id','=',$ubicacion]])->paginate(10);

                           }
                           $escolaridades=Escolaridades::orderBy('id')->where('escolaridad','<>',"N/A")->get();
                           return view('listavacantes',['vacantes'=>$vacantes,'escolaridades'=>$escolaridades]);

    }


    public function get_elementos(Request $request){
      $convocatorias = Convocatorias::orderBy('id')->get();
    }

    public function contacto(){
      return view('contactanos');
    }

    public function directorios(Request $request){
      return view('directorio');
    }

    public function mail(Request $request){
      $email="riquelme_2112@hotmail.com";
      Mail::send('mails.aprobacionusuarios', $data, function ($message) use ($email) {
      $message->from('juampa5858@gmail.com', 'Bolsa de Empleo Salamanca, Gto.');
      $message->to($email);
    });
    }
}
