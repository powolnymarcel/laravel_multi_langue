<?php

namespace App\Http\Controllers;

use App\Language;
use Illuminate\Http\Request;

use App\Http\Requests;

class BackendController extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }
    public function index(){
        return view('backend.index');

    }
}
