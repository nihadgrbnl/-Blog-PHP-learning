@extends('layouts.blog')

@section('title', $post->title)

@section('content')

    <div class="article-header">
        <span class="article-tag">Yazı</span>
        <h1 class="article-title">{{ $post->title }}</h1>
        <div class="article-meta">
            <span>{{ $post->created_at->format('d M Y') }}</span>
            <div class="article-divider"></div>
            <span>No. {{ str_pad($post->id, 3, '0', STR_PAD_LEFT) }}</span>
            @if($post->updated_at > $post->created_at)
                <div class="article-divider"></div>
                <span>Güncellendi {{ $post->updated_at->format('d M Y') }}</span>
            @endif
        </div>
    </div>

    <div class="article-body">
        <p>{{ $post->body }}</p>
    </div>

    @auth
        <div class="action-row">
            <a href="/posts/{{ $post->id }}/edit" class="btn-outline">Düzenle</a>
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-danger">Sil</button>
            </form>
        </div>
    @endauth

    <div style="margin-top: 2rem;">
        <a href="/posts" class="btn-outline">← Tüm yazılar</a>
    </div>

@endsection