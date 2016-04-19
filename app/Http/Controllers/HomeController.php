<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    public function register(){
        return view('auth.register');
    }

    public function NDAgeneral(){
        return view('NDA.general');
    }

    public function NDAcadmva(){
      return view('NDA.cadmva');
    }

    public function NDAcontabilidad(){
      return view('NDA.contabilidad');
    }

    public function NDAplaneacion(){
      return view('NDA.planeacion');
    }

    public function NDAcontrol(){
      return view('NDA.control');
    }

    public function NDAoperaciones(){
      return view('NDA.operaciones');
    }

    public function NDAfacturacion(){
      return view('NDA.facturacion');
    }

    public function NDAmensajero(){
      return view('NDA.mensajero');
    }

}
