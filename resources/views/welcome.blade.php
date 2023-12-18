@extends('layouts.blog')

@section('title')
    {{ 'Les derniers articles' }}
@endsection

@section('content')
    <section class="max-w-7xl bg-white py-16 px-12 rounded-lg mx-auto">
        <h1>Les derniers articles</h1>
        <div class="flex flex-row justify-center flex-wrap gap-8">
            @foreach($posts as $post)
                <div class="flex flex-col w-1/4 px-4 py-2 border-[1px] border-gray-100 rounded-lg shadow-lg">
                    <h2>{{ $post->title }}</h2>
                    <div class="mb-4">{{ $post->content }}</div>
                    <a href="{{ route('post', ['post' => $post]) }}" class="btn mt-auto mb-2 mx-auto">Voir l'article</a>
                </div>
            @endforeach
        </div>
        <div class="mt-6">
            {{ $posts->links('pagination::tailwind') }}
        </div>
    </section>
@endsection
