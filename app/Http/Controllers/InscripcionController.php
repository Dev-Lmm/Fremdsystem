<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\Cursos;
use App\Models\Inscripcion;
use CreateMiscursosTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class InscripcionController extends Controller {
    //

    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function inscritos() {
        $cursos = Cursos::all();
        return view ( 'miscursos.inscritos', compact( 'cursos' ) );
    }

    public function inscribe( Request $request ) {
        $miscursos = new Inscripcion;
        $miscursos->nombre = $request->input( 'nombre' );
        $miscursos->email = $request->input( 'email' );
        $miscursos->curso_inscripcion = $request->input( 'curso_inscripcion' );
        $miscursos->save();

        Alert::success( '¡Éxito!', 'Se creo el Curso correctamente' );
        return redirect()->route( 'miscursos.inscritos' );
        //return view ( 'miscursos.inscritos' );
    }
}