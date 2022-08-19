<?php

namespace App\Http\Controllers;

use App\Http\Controllers\User\FilesController;
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
        $this->middleware( 'auth' );
        //$this->middleware( 'role:Admin' )->only( [ 'homework' ] );
        //$this->middleware( 'role:Admin' )->only( [ 'uno' ] );

    }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */

    public function index()
    {
        return view( 'home' );
    }

    public function uno()
 {
        return view ( 'pestaña1' );
    }
}