<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class CursosController extends Controller {

    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index() {
        return view ( 'crear' );
    }

    public function actualizar( $id ) {
        $curso = Cursos::findOrFail( $id );
        //dd( $curso );
        return view ( 'editar', compact( 'curso' ) );
    }

    public function cambiar( Request $request, $id ) {
        $curso = Cursos::findOrFail( $id );
        $curso->name = $request->input( 'name' );
        $curso->maestro = $request->input( 'maestro' );
        $curso->actividad = $request->input( 'actividad' );
        $curso->save();
        return redirect()->route( 'courses' );
    }
    /*

    public function editar( $id ) {
        $curso = Cursos::findOrFail( $id );

        return view ( 'courses.editar', compact( 'curso' ) );
        //return view ( 'courses.editar' );

    }
    */
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    protected function create( array $data ) {
        return Cursos::create( [
            'name'=> $data[ 'name' ],
            'nivel'=> $data[ 'nivel' ],
            'calificacion_final'=> $data[ 'calificacion_final' ],
            'calificacion_actividad'=> $data[ 'calificacion_actividad' ],
            'actividad'=> $data[ 'actividad' ],
            'maestro'=> $data[ 'maestro' ],
            'cupo'=> $data[ 'cupo' ],
            'user_id'=> $data[ 'user_id' ],
        ] );
    }

    public function course() {
        $cursos = DB::table( 'cursos' )->select( 'cursos.*' )->get();
        return view ( 'courses.course', compact( 'cursos' ) );

    }

    public function crear( Request $request ) {
        $nuevoCurso = new Cursos;
        $nuevoCurso->name = $request->input( 'name' );
        $nuevoCurso->nivel = $request->input( 'nivel' );
        $nuevoCurso->calificacion_final = $request->input( 'calificacion_final' );
        $nuevoCurso->calificacion_actividad = $request->input( 'calificacion_actividad' );
        $nuevoCurso->actividad = $request->input( 'actividad' );
        $nuevoCurso->maestro = $request->input( 'maestro' );
        $nuevoCurso->cupo = $request->input( 'cupo' );
        $nuevoCurso->user_id = $request->input( 'user_id' );
        $nuevoCurso->save();
        Alert::success( '¡Éxito!', 'Se creo el Curso correctamente' );
        return redirect()->route( 'courses' );
        //return $request->all();
    }

    public function destroy( Request $request, $id ) {
        $curso = Cursos::findOrFail( $id );
        $curso->delete();
        Alert::success( '¡Éxito!', 'Se elimino el Curso' );
        return redirect()->route( 'courses' );
        //return $curso;
    }
    /*

    public function inscripcionCurso( Request $request ) {
        $inscripcion =  new  Inscripcion;
        $inscripcion->name = $request->input( 'name' );
        $inscripcion->maestro = $request->input( 'maestro' );
        $inscripcion->save();
        return view ( 'miscursos.inscritos', compact( 'inscripcion' ) );
    }
    */

    public function inscripcion() {
        $cursos = Cursos::all();
        return view ( 'miscursos.inscripcion', compact( 'cursos' ) );

    }

    public function inscritos() {
        $inscripcion = Inscripcion::all();
        return view ( 'inscritos', compact ( 'inscripcion' ) );
    }

}