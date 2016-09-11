<?php

namespace App\Http\Controllers;

use App\Language;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use Illuminate\Support\Facades\View;
use Session;
class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function __construct(){

//Si il n'y as pas de langue definie on prend celle par defaut définie dans settings.php
        if(defined('CORE_MULTI_LANG') && CORE_MULTI_LANG == 1){
            $lang = (Session::get('language') != "" ? Session::get('language') : CORE_LANG);
            App::setLocale($lang);
        }

        //Variable langage GLOBALE, partagées avec toutes les vues
        $languages = Language::orderBy('folder','asc')->get();
        View::share('languages',$languages);

    }
}
