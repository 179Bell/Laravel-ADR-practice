@extends('layouts.app')

@section('title', 'トップページ')

@section('content')
    <h2 class="d-flex justify-content-center">トップページ</h2>
    <div class="row row-cols-md-3 g-3">
            @foreach ($articles as $article)
            <div class="col">
                <div class="card">
                    <a href="">
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
