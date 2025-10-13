@extends('base')

@section('title', $post->title)

@section('content')
    <article>
        <h1>{{ $post->title }}</h1>
        <p>
            {{ $post->content }}
        </p>
        <p class="text-sm text-gray-500"><em>Publié le {{ $post->created_at->format('d/m/Y') }}</em></p>
    </article>
@endsection
