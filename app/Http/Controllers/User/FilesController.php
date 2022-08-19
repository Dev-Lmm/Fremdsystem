<?php

namespace App\Http\Controllers\User;

use App\Models\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class FilesController extends Controller
 {

    public function __construct()
 {
        $this->middleware( 'auth' );

        $this->middleware( 'role:Admin' )->only( [ 'index' ] );
    }

    public function index()
 {
        //$files = File::all();
        $files = File::where( 'user_id', Auth::id() )->latest()->get();
        return view ( 'user.files.index', compact( 'files' ) );
    }

    public function create()
 {

    }

    public function show( Request $request, $id )
 {
        $file = File::whereId( $id )->firstOrFail();

        $user_id = Auth::id();

        if ( $file->user_id == $user_id ) {
            return redirect ( '/storage' . '/'. $user_id . '/' . $file->name );
        } else {
            Alert::error( '¡Error!', 'No tienes permisos para ver este archivo' );
            return back();
        }
        //dd( $file );
        //dd( $file );
    }

    public function store( Request $request )
 {
        $max_size = ( int ) ini_get( 'upload_max_filesize' )*10240;
        $files = $request->file( 'files' );
        $user_id = Auth::id();

        if ( $request->hasFile( 'files' ) ) {
            foreach ( $files as $file ) {
                //nota a la hora de colocar el punto final y el parentecis debe ser despues del slug para concatenar lo demas
                //debe estar antes del cocatenado del punto y de la extension del archivo
                if ( Storage::putFileAs( '/public/' . $user_id . '/', $file, $file->
                getClientOriginalName() ) ) {
                    File::create( [
                        'name' => $file->getClientOriginalName(),
                        'user_id' => $user_id
                    ] );
                }
            }
            Alert::success( '¡Éxito!', 'Se cargo el archivo correctamente' );
            return back();
            //dd( $files );
        } else {
            Alert::error( '¡Error!', 'Debes subir uno o 2 archivos como maximo' );
            return back();
        }

    }

    public function destroy( Request $request, $id ) {
        //obtener el archivo que se quiere eliminar
        $file = File::whereId( $id )->firstOrFail();
        //borra el archivo en almacenamiento
        $pathToFile = storage_path( 'app/public/' . Auth::id() . '/' . $file->name );
        unlink( storage_path( 'app'.'/'. 'public' . '/' .Auth::id() . '/' . $file->name ) );
        //unlink( public_path( 'storage' . '/' . Auth::id() . '/' . $file->name ) );
        //$pathToFile = storage_path( 'app/public/' . Auth::id() . '/' . $file->name );
        //borra el registro en la base de datos
        $file->delete();
        //avisar que se elimino con exito
        Alert::info( '¡Atencion!', 'Se ha eliminado el archivo' );
        return back();

        //dd( 'archivo eliminado' );
    }

    public function download( Request $request, $id ) {

        $file = File::whereId( $id )->firstOrFail();
        $pathToFile = storage_path( 'app/public/' . Auth::id() . '/' . $file->name );
        return response()->download( $pathToFile );
    }
}