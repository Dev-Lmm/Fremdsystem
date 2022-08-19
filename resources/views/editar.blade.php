@extends('layouts.app')

@section('tittle', 'Inscripcion')

@section('content')
    <br>
    <br>
    <br>
    <div>
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Cursos</span>
                    <div class="table-responsive">
                        <table class="table">
                            <form action="{{ route('cursos.editar.update', $curso->id) }}" method="POST">
                                @method('put')
                                @csrf

                                <div class="form-group">
                                    <label for="name">name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $curso->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="nivel">nivel</label>
                                    <input type="text" class="form-control" name="nivel" value="{{ $curso->nivel }}">
                                </div>

                                <div class="form-group">
                                    <label for="calificacion_final">calificacion final</label>
                                    <input type="text" class="form-control" name="calificacion_final"
                                        value="{{ $curso->calificacion_final }}">
                                </div>

                                <div class="form-group">
                                    <label for="calificacion_actividad">calificacion actividad</label>
                                    <input type="text" class="form-control" name="calificacion_actividad"
                                        value="{{ $curso->calificacion_actividad }}">
                                </div>

                                <div class="form-group">
                                    <label for="actividad">actividad</label>
                                    <input type="text" class="form-control" name="actividad"
                                        value="{{ $curso->actividad }}">
                                </div>

                                <div class="form-group">
                                    <label for="maestro">maestro</label>
                                    <input type="text" class="form-control" name="maestro" value="{{ $curso->maestro }}">
                                </div>

                                <div class="form-group">
                                    <label for="cupo">cupo</label>
                                    <input type="text" class="form-control" name="cupo" value="{{ $curso->cupo }}">
                                </div>

                                <div class="form-group">
                                    <label for="user_id">user id</label>
                                    <input type="text" class="form-control" name="user_id" value="{{ $curso->user_id }}">
                                </div>






                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-secondary" href="{{ route('courses') }}"
                                        class="card-link">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>


                            </form>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
