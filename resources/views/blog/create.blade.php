@extends('base')

@section('title', 'Blog - Liste des articles')

@section('content')
    <h1>Liste des articles</h1>
    @foreach ($posts as $post)
        <article class="mb-4 p-4 border border-gray-300 rounded-lg shadow-sm hover:shadow-md transition-shadow">
            <h2 class="text-2xl font-bold mb-2">{{ $post->title }}</h2>
            <p class="text-gray-700 mb-2">{{ $post->content }}</p>
            <p>
                <a href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id]) }}"
                    class="text-violet-900 hover:font-bold">
                    Lire la suite
                </a>
            </p>
            {{-- <p class="text-sm text-gray-500"><em>Publié le {{ $post->created_at->format('d/m/Y') }}</em></p> --}}
        </article>

    @endforeach
    {{ $posts->links('pagination::tailwind') }}
@endsection
