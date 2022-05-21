@extends('layouts.app')

@section('content')
    <div class="col-sm-9">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">📰 Crear un artículo</h4>
            </div>
            <form
                action="{{ route('posts.store') }}"
                method="POST"
                enctype="multipart/form-data"
                autocomplete="off"
            >
                @csrf
                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger mb-1" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        <label>Título *</label>
                        <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label>Imagen</label>
                        <input type="file" name="image">
                    </div>
                    <div class="form-group">
                        <label>Contenido *</label>
                        <textarea name="body" rows="5" class="form-control" required>{{ old('body') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Contenido embebido</label>
                        <textarea name="iframe" class="form-control">{{ old('iframe') }}</textarea>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="form-group mb-0">
                        <input type="submit" class="btn btn-sm btn-success"  value="Enviar">
                        <a href="{{ route('posts.index') }}" class="btn btn-sm btn-primary">Volver</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection