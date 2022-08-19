@extends('layouts.app')

@section('tittle', 'Homework')

@section('content')

    <br>
    <br>

    <br>
    <br>

    <br>
    <br>

    <section id="Homework">
        <p>Tarea nivel 1 ingles reading</p>
        <form method="POST" action="{{ route('user.files.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="file" class="form-control" name="files[]" multiple required>

            <button type="submit" class="mt-4 btn btn-primary float-left">subir</button>
        </form>
    </section>


    <section id="Homework">
        <p>Tarea nivel 1 ingles writing</p>
        <form method="POST" action="{{ route('user.files.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="file" class="form-control" name="files[]" multiple required>

            <button type="submit" class="mt-4 btn btn-primary float-left">subir</button>
        </form>
    </section>


    <section id="Homework">
        <p>Tarea nivel 1 ingles speaking</p>
        <form method="POST" action="{{ route('user.files.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="file" class="form-control" name="files[]" multiple required>

            <button type="submit" class="mt-4 btn btn-primary float-left">subir</button>
        </form>
    </section>
@endsection
