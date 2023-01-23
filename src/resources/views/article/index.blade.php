@extends('layouts.app')

@section('title', 'トップページ')

@section('content')
    <h2 class="d-flex justify-content-center">トップページ</h2>
        @if (session('delete_success'))
            <div class="alert alert-success">
                {{ session('delete_success') }}
            </div>
        @elseif (session('update_success'))
            <div class="alert alert-success">
                {{ session('update_success') }}
            </div>
        @endif
    <div class="row row-cols-md-3 g-3">
            @foreach ($articles as $article)
            <div class="col">
                <div class="card">
                    <a href="{{ route('article.detail' , ['id' => $article->id]) }}">
                        <div class="card-body">
                            <h5>{{ $article->title }}</h5>
                            <p class="card-text">
                                {{ $article->content }}
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
@endsection
