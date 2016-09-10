<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    
    public function __construct(){
        parent::__construct();
    }

    public function getForms(){
        return view('backend.pages.forms');
    }

    public function getBootstrapselements(){
        return view('backend.pages.bootstrapelements');
    }

    public function getBlank(){
        return view('backend.pages.blank');
    }

    public function getTables(){
        return view('backend.pages.tables');
    }

    public function getBootstrapsgrid(){
        return view('backend.pages.grids');
    }

}
