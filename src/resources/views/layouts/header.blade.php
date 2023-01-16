<header>
    <div class="container">
        @if (Auth::check())
            <button onclick="location.href='{{ route('article.create') }}'">投稿する</button>
        @else
            <button onclick="location.href='{{ route('login') }}'">ログインする</button>
            <button onclick="location.href='{{ route('register') }}'">登録する</button>
        @endif
    </div>
</header>
