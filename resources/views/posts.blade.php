@extends('layouts.app')

@section('content')
    <div class="col-sm-9">
        <h3>List of Posts</h3>

        @foreach ($posts as $post)
            <div class="card mb-1">
                <div class="card-body">
                    {{ $post->title }}
                </div>
            </div>
        @endforeach

    </div>
@endsection