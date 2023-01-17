@extends('layouts.app')

@section('title', '投稿ページ')

@section('content')
    <h2 class="d-flex justify-content-center">投稿ページ</h2>

    <form action="{{ route('article.post') }}" method="POST">
        @csrf
        <div class="input-group">
            <label for="title" name="title" class="form-label">タイトル</label>
            <input type="text" name="title" id="title" placeholder="タイトルを入力" class="form-control">
        </div>
        <div class="input-group">
            <label for="content" name="content" class="form-label">本文</label>
            <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <button class="btn btn-success" type="submit">投稿する</button>
    </form>

@endsection
