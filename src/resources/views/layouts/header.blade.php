<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <h1 class="d-flex justify-content-center mt-4"><a href="{{ route('article.index') }}">{{ config('app.name') }}</a></h1>
            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarButtonsExample">
                <!-- Left links -->
                {{-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
                </ul> --}}
                <!-- Left links -->

                <nav class="d-flex justify-content-end align-items-center navbar-nav ms-auto">
                    @if (Auth::check())
                        <button class="btn btn-success nav-item" onclick="location.href='{{ route('article.create') }}'">投稿する</button>
                    @else
                        <button onClick="location.href='{{ route('login') }}'" type="button nav-item" class="btn btn-link px-3 me-2">
                            ログインする
                        </button>
                        <button onClick="location.href='{{ route('register') }}'" type="button nav-item" class="btn btn-primary me-3">
                            登録する
                        </button>
                    @endif
                </nav>
            </div>
            <!-- Collapsible wrapper -->
        </div>
    </nav>
</header>
