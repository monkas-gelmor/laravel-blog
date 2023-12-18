@extends('layouts.blog')

@section('title'){{ $post->title }}@endsection

@section('content')
    <section class="max-w-7xl bg-white py-16 px-12 rounded-lg mx-auto">
        <h1>{{ $post->title }}</h1>
        <div class="flex">
            {{ $post->content }}
        </div>
    </section>
@endsection
