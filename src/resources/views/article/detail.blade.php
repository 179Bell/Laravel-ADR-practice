@extends('layouts.app')

@section('title', '詳細')

@section('content')
    <h3 class="d-flex justify-content-center">詳細ページ</h3>
        @if (session('delete_failed'))
            <div class="alert alert-warning">
                {{ session('delete_failed') }}
            </div>
        @endif
    <h2>{{ $article->title  }}</h2>
    <p>{{ $article->content }}</p>
    <p>{{ $article->created_at }}</p>
    @if (Auth::id() === $article->user_id)
    <form action="{{ route('article.delete', ['id' => $article->id]) }}" method="post">
        @csrf
        <button class="btn btn-danger">削除する</button>
    </form>
        <button class="btn btn-success" onclick="location.href='{{ route('article.edit', ['id' => $article->id]) }}'">編集する</button>
    @endif
@endsection
