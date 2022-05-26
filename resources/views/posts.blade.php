@extends('layouts.app')

@section('content')
    <div class="col-sm-9">

        @foreach ($posts as $post)
        <div class="card mb-4">
            <div class="card-body">
                @if ($post->image)
                    <img src="{{ $post->get_image }}" class="card-img-top mb-3">
                @elseif ($post->iframe)
                    <div class="embed-responsive embed-responsive-16by9 mb-3">
                        {!! $post->iframe !!}
                    </div>
                @endif
                <h3 class="card-title">{{ $post->title }}</h3>
                <p class="card-text">
                    {{ $post->get_excerpt }}
                    <a href="{{ route('blog', $post) }}">Leer más ...</a>
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
