@extends('layouts.app')

@section('tittle', 'courses')

@section('content')
    <div>
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Cursos</span>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <form action="{{ route('cursos.crear') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="name">name</label>
                                <input type="text" class="form-control" name="name">
                            </div>

                            <div class="form-group">
                                <label for="nivel">nivel</label>
                                <input type="text" class="form-control" name="nivel">
                            </div>

                            <div class="form-group">
                                <label for="calificacion_final">calificacion final</label>
                                <input type="text" class="form-control" name="calificacion_final">
                            </div>

                            <div class="form-group">
                                <label for="calificacion_actividad">calificacion actividad</label>
                                <input type="text" class="form-control" name="calificacion_actividad">
                            </div>

                            <div class="form-group">
                                <label for="actividad">actividad</label>
                                <input type="text" class="form-control" name="actividad">
                            </div>

                            <div class="form-group">
                                <label for="maestro">maestro</label>
                                <input type="text" class="form-control" name="maestro">
                            </div>

                            <div class="form-group">
                                <label for="cupo">cupo</label>
                                <input type="text" class="form-control" name="cupo">
                            </div>

                            <div class="form-group">
                                <label for="user_id">user id</label>
                                <input type="text" class="form-control" name="user_id">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>


                        </form>
                        <tbody>

                        </tbody>
                    </table>
                </div>


                <div class="table-responsive">
                    <table class="table">
                        <div>
                            <div class="boxes">

                            </div>
                        </div>
                    </table>
                </div>



            </div>
        </div>
    </div>



    <!-- Modal -->

@endsection
