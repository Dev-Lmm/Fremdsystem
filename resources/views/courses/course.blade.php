@extends('layouts.app')

@section('tittle', 'Course')

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
                        <div>
                            <!-- Button trigger modal -->
                            @can('courses')
                                <a href="{{ route('cursos.index') }}" class="btn btn-success">
                                    Agregar Curso
                                </a>
                            @endcan


                        </div>
                    </table>
                </div>


                <div class="table-responsive">
                    <table class="table">
                        <div>

                            @foreach ($cursos as $curso)
                                <div class="card" style="background-color:white;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $curso->name }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Maestro: {{ $curso->maestro }}</h6>
                                        <p class="card-text">Actividad: {{ $curso->actividad }}</p>
                                        <a href="#" class="card-link">Inscribirse</a>

                                        <a href="{{ route('cursos.actualizar', $curso->id) }}" class="card-link">Editar
                                            Curso</a>

                                        @can('courses')
                                            <a href="javascript: document.getElementById('delete-{{ $curso->id }}').submit()"
                                                class="card-link">Eliminar Curso</a>

                                            <form id="delete-{{ $curso->id }}"
                                                action="{{ route('cursos.destroy', $curso->id) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                            </form>
                                        @endcan
                                    </div>
                                </div>
                                <br>
                            @endforeach

                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>




@endsection
