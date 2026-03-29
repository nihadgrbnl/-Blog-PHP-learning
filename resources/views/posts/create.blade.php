@extends('layouts.blog')

@section('title', 'Yeni Yazı')

@section('content')

    <div class="form-wrap">
        <div class="form-header">
            <h1>Yeni Yazı</h1>
        </div>

        @if ($errors->any())
            <ul class="errors">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="/posts" method="POST">
            @csrf

            <div class="form-group">
                <label>Başlık</label>
                <input type="text" name="title" value="{{ old('title') }}" placeholder="Yazınıza bir başlık verin...">
            </div>

            <div class="form-group">
                <label>İçerik</label>
                <textarea name="body" rows="12" placeholder="Yazmaya başlayın...">{{ old('body') }}</textarea>
            </div>

            <div style="display:flex; align-items:center; gap:2rem; margin-top:2rem;">
                <button type="submit" class="btn-primary">Yayınla</button>
                <a href="/posts" class="btn-outline">Vazgeç</a>
            </div>
        </form>
    </div>

@endsection