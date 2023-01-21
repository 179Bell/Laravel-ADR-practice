@extends('layouts.app')

@section('title', '詳細')

@section('content')
    <h3 class="d-flex justify-content-center">詳細ページ</h3>
    <h2>{{ $article->title  }}</h2>
    <p>{{ $article->content }}</p>
    <p>{{ $article->created_at }}</p>
    @if (Auth::id() === $article->user_id)
        <button class="btn btn-danger" onclick="location.href='#">削除する</button>
        <button class="btn btn-success" onclick="location.href='#">編集する</button>
    @endif
@endsection
