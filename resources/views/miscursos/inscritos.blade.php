@extends('layouts.app')

@section('tittle', 'courses')

@section('content')

    <br>
    <br>
    <br>
    <form action="{{ route('miscursos.crearinscribe') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">nombre</label>
            <input type="text" class="form-control" name="nombre">
        </div>
        <div class="form-group">
            <label for="email">email</label>
            <input type="text" class="form-control" name="email">
        </div>
        <div>
            <label for="">Seleccion de Curso</label>
            <select name="curso_inscripcion" id="curso_inscripcion" class="form-select" aria-label="Default select example">
                <option selected>Cursos Disponibles</option>
                @foreach ($cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>


    </form>

@endsection
