<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
use App;
class LanguageController extends Controller
{
    public function __construct(){
        parent::__construct();
    }

    /**
     * @param $folder
     * @return mixed
     */
    public function getChange($folder){
        Session::put('language', $folder);
        App::setLocale($folder);
        //return $lang = \Session::get('language');
        //return $lang = \Config::get('app.locale');
        return Redirect::back();
    }
}
