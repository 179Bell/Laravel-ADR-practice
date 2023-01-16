@extends('layouts.app')

@section('title', '投稿ページ')

@section('content')
    <h2 class="d-flex justify-content-center">投稿ページ</h2>

    <form action="{{ route('article.post') }}" method="POST">
        @csrf
        <label for="title" name="title">タイトル</label>
        <input type="text" name="title" id="title" placeholder="タイトルを入力">
        <label for="content" name="content">本文</label>
        <textarea name="content" id="" cols="30" rows="10"></textarea>
        <button type="submit">投稿する</button>
    </form>

@endsection
