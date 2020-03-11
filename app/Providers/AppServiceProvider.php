<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Convocatorias;
use App\Galerias;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      view()->composer('convocatorias', function($view){
      $convocatorias=Convocatorias::orderBy('id')->get();
      $view->with('convocatorias',$convocatorias);
      });

      view()->composer('galerias',function($view){
        $imagenesindex=Galerias::orderBy('id','desc')->take(4)->get();
        $view->with('imagenesindex',$imagenesindex);

      });
      view()->composer('galerias',function($view){
      $imagenes=Galerias::orderBy('id','desc')->get();
      $view->with('imagenes',$imagenes);

      });
       view()->composer('galerias',function($view){
          $imagenesfooter=Galerias::orderBy('id')->get();
          $view->with('imagenesfooter',$imagenesfooter);
        });

        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
