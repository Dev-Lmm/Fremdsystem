<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlumnoController extends Controller
 {
    //

    public function __construct()
 {
        $this->middleware( 'auth' );

        $this->middleware( 'role:Alumno' )->only( [ 'uno' ] );
    }

    public function index()
 {
        return view( 'home' );
    }

    public function uno()
 {
        return view( 'files' );
    }
}