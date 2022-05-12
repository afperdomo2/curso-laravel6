@extends('layouts.app')

@section('content')
    <div class="col-sm-9">
        <h3>List of Posts</h3>

        @foreach ($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    {{ $post->title }}
                </div>
                <div class="card-footer pt-1 pb-1">
                    🤖 {{ $post->user->name }}
                </div>
            </div>
        @endforeach

    </div>
@endsection