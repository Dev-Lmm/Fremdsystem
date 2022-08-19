@extends('layouts.app')

@section('tittle', 'Homework')

@section('content')
    <br>
    <br>
    <section id="Homework">

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name del Archivo</th>
                        <th scope="col">Ver</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($files as $file)
                        <tr>
                            <th scope="row">{{ $file->user_id }}</th>
                            <td>{{ $file->name }}</td>
                            <td>

                                <!--<a target="_blank" href="{{ route('user.files.show', $file->id) }}" class="btn btn-sm btn-outline-secondary">
                                          ver
                                          </a>-->

                                <a href="{{ route('books.download', $file->id) }}" class="btn btn-sm btn-outline-secondary">
                                    download
                                </a>

                            </td>
                            <td>
                                <form action="{{ route('user.files.destroy', $file->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        Eliminar
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </section>
@endsection
