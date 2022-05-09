@extends('layouts.app')

@section('content')
    <div class="col-sm-7">

        <div class="card border-0 shadow mt-4">
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="post" class="row gy-2 gx-3 align-items-center" autocomplete="off">
                    <div class="col-auto">
                        <input type="text" name="name" class="form-control form-control-sm" placeholder="Nombre" value="{{ @old('name') }}">
                    </div>
                    <div class="col-auto">
                        <input type="email" name="email" class="form-control form-control-sm" placeholder="Email" value="{{ @old('email') }}">
                    </div>
                    <div class="col-auto">
                        <input type="password" name="password" class="form-control form-control-sm" placeholder="Contraseña" value="{{ @old('password') }}">
                    </div>
                    <div class="col-auto">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-success">Enviar</button>
                    </div>
                </form>
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show mt-3 mb-0" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>

        <table class="table table-hover mt-4">
            <thead class="thead-default">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="align-middle">
                    <td scope="row">{{ $loop->index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('users.destroy', $user) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <input
                                type="submit"
                                value="Eliminar"
                                class="btn btn-sm btn-danger"
                                onclick="return confirm('¿ Desea eliminar a: {{ $user->name }} ?')"
                            >
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
