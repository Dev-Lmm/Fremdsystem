<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;

use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BlogController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\User\FilesController;
use App\Http\Controllers\CreateCourseController;
use App\Models\Cursos;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login'); 
});

Auth::routes();



Route::group(['middleware' => ['auth']], function(){


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

    Route::get('/files', [App\Http\Controllers\AlumnoController::class, 'uno'])->name('uno');

    Route::resource('roles', RolController::class)->names('admin.roles');
    Route::resource('usuarios', UsuarioController::class)->names('index2');
    Route::resource('blogs', BlogController::class);

    //Route::view('/courses', 'courses.course') ->name('courses');
    Route::view('/schedule', 'courses.schedule') ->name('schedule');
    Route::view('/homework', 'activities.homework') ->name('homework');
    Route::view('/exam', 'activities.exam') ->name('exam');
    Route::view('/qualify', 'student.qualify') ->name('qualify');
    Route::view('/setting', 'setting') ->name('setting');
    Route::view('/add', 'create.course') ->name('add');
    

        //unlink
        Route::get('storage-link', function(){
            Artisan::call('storage:link'); 
         });

    //subida de archivo rutas
    Route::post('/upload',[App\Http\Controllers\User\FilesController::class, 'store'])->name('user.files.store');
    Route::get('/storage/{file}/dowload',[App\Http\Controllers\User\FilesController::class, 'download'])->name('books.download');
    Route::get('/files', [App\Http\Controllers\User\FilesController::class, 'index'])->name('user.files.index');
    Route::get('/file/{file}', [App\Http\Controllers\User\FilesController::class, 'show'])->name('user.files.show');
    Route::delete('/delete-file/{file}', [App\Http\Controllers\User\FilesController::class, 'destroy'])->name('user.files.destroy');

    //controladores de cursos
    Route::get('/courses', [App\Http\Controllers\CursosController::class, 'course'])->name('courses');
    Route::get('/crear', [App\Http\Controllers\CursosController::class, 'index'])->name('cursos.index');
    Route::get('/actualizar/{id}', [App\Http\Controllers\CursosController::class, 'actualizar'])->name('cursos.actualizar');
    Route::post('/cursos', [App\Http\Controllers\CursosController::class, 'crear'])->name('cursos.crear');
    Route::delete('/cursos/{id}', [App\Http\Controllers\CursosController::class, 'destroy'])->name('cursos.destroy');

    //prueba inestable
    //Route::get('cursos/{id}/edit', function ($id){$curso = Cursos::findOrFail($id);return view ('courses.editar', compact('curso'));})->name('cursos.editar');
    Route::put('/products/{id}', [App\Http\Controllers\CursosController::class, 'cambiar'])->name('cursos.editar.update');
    
    Route::get('/inscripcion', [App\Http\Controllers\CursosController::class, 'inscripcion'])->name('inscripcion');
    Route::get('/inscritos', [App\Http\Controllers\InscripcionController::class, 'inscritos'])->name('miscursos.inscritos');
    Route::post('/inscribe', [App\Http\Controllers\InscripcionController::class, 'inscribe'])->name('miscursos.crearinscribe');
    

    
    
    
    
    
});