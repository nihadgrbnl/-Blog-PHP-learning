@extends('layouts.blog')

@section('title', $post->title)

@section('content')

    <div class="bg-white rounded shadow p-6">
        <h1 class="text-2xl font-bold mb-4">{{ $post->title }}</h1>
        <p class="text-gray-700 leading-relaxed">{{ $post->body }}</p>
        <small class="text-gray-400 mt-4 block">{{ $post->created_at->format('d.m.Y') }}</small>

        <div class="flex gap-4 mt-6">
            <a href="/posts/{{ $post->id }}/edit" class="text-blue-600">Düzenle</a>

            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500">Sil</button>
            </form>

            <a href="/posts" class="text-gray-500">Geri dön</a>
        </div>
    </div>

@endsection