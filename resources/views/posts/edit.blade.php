@extends('layouts.blog')

@section('title', 'Yazıyı Düzenle')

@section('content')

    <div class="bg-white rounded shadow p-6">
        <h1 class="text-2xl font-bold mb-6">Yazıyı Düzenle</h1>

        @if ($errors->any())
            <ul class="bg-red-50 text-red-600 p-4 rounded mb-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Başlık</label>
                <input type="text" name="title" value="{{ old('title', $post->title) }}"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-1">İçerik</label>
                <textarea name="body" rows="6"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('body', $post->body) }}</textarea>
            </div>

            <button type="submit"
                class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                Güncelle
            </button>
        </form>

        <a href="/posts/{{ $post->id }}" class="text-gray-500 mt-4 block">Geri dön</a>
    </div>

@endsection