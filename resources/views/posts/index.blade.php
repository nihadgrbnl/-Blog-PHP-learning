@extends('layouts.blog')

@section('title', 'Yazılar')

@section('content')

    <div class="page-header">
        <h1>Tüm Yazılar</h1>
        <span>{{ $posts->count() }} yazı</span>
    </div>

    @forelse ($posts as $post)
        <a href="/posts/{{ $post->id }}" class="post-card">
            <div>
                <div class="post-number">No. {{ str_pad($post->id, 3, '0', STR_PAD_LEFT) }}</div>
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->body }}</p>
                <div class="post-meta">{{ $post->created_at->format('d M Y') }}</div>
            </div>
            <div class="post-arrow">→</div>
        </a>
    @empty
        <div class="empty">
            <div class="empty-num">∅</div>
            <p>Henüz hiç yazı yok</p>
        </div>
    @endforelse

@endsection