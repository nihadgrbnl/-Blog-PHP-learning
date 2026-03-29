@extends('layouts.blog')

@section('title', 'Düzenle')

@section('content')

    <div class="form-wrap">
        <div class="form-header">
            <h1>Yazıyı Düzenle</h1>
        </div>

        @if ($errors->any())
            <ul class="errors">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Başlık</label>
                <input type="text" name="title" value="{{ old('title', $post->title) }}">
            </div>

            <div class="form-group">
                <label>İçerik</label>
                <textarea name="body" rows="12">{{ old('body', $post->body) }}</textarea>
            </div>

            <div style="display:flex; align-items:center; gap:2rem; margin-top:2rem;">
                <button type="submit" class="btn-primary">Güncelle</button>
                <a href="/posts/{{ $post->id }}" class="btn-outline">Vazgeç</a>
            </div>
        </form>
    </div>

@endsection