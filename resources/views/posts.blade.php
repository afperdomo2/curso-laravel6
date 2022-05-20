@extends('layouts.app')

@section('content')
    <div class="col-sm-9">

        @foreach ($posts as $post)
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">
                    {{ $post->get_excerpt }}
                    <a href="{{ route('post', $post) }}">Leer más ...</a>
                </p>
                <p class="text-muted mb-0">
                    <em>
                        🤖 {{ $post->user->get_name }} &emsp; 📅 {{ $post->created_at->format('d M Y') }}
                    </em>
                </p>
            </div>
        </div>
        @endforeach

        <div class="d-flex mt-3">
            {{ $posts->links() }}
        </div>

    </div>
@endsection
