@extends('layouts.app')

@section('content')
    <div class="col-sm-9">

        <div class="card mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="mb-0">📰 Artículos</h4>
                    </div>
                    <div class="col-4">
                        <a href="{{ route('posts.create') }}" class="btn btn-sm btn-success float-right">➕ Crear</a>
                    </div>
                </div>
            </div>
            <div class="card-body pb-1">

                <table class="table table-hover mt-0">
                    <thead class="thead-default">
                        <tr>
                            <th>#</th>
                            <th>Título</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr class="align-middle">
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td>{{ $post->title }}</td>
                            <td>
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-primary">Editar</a>
                            </td>
                            <td>
                                <form action="{{ route('posts.destroy', $post) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <input
                                        type="submit"
                                        value="Eliminar"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('¿ Eliminar el Artículo # {{ $loop->index + 1 }} ?')"
                                    >
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex mt-3">
                    {{ $posts->links() }}
                </div>

            </div>
        </div>

    </div>
@endsection
