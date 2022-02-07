<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <title>@yield('title') -Qiita</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> --}}
    <script src="{{ asset('js/pp.js') }}"></script>
</head>
<body>
    <header>
        <div class="col-sm-4" style="padding:20px 0; padding-left:0px;">
            <form method='GET' class="form-inline" action="/posts">
                <div class="form-group">
                <input type="text" name="keyword" class="form-control" placeholder="キーワードを検索">
                </div>
              <input type="submit" name="submit" value="検索" class="btn btn-info">
            </form>
        </div>
        <details>
            <summary>Qiita</summary>
            <div>ログイン中のQuitta Team</div>
            <div>ログイン中のチームがありません</div>
            <a href=''>Quitta Teamにログイン</a>
            <ul class="community">
                <li>コミュニティ</li>
                <li><a href=''>Organization</a></li>
                <li><a href=''>イベント</a></li>
                <li><a href=''>アドベントカレンダー</a></li>
                <li><a href=''>Qiitadon(β)</a></li>
            </ul>
            <ul>
                <li>サービス</li>
                <li><a href=''>Qiita Job</a></li>
                <li><a href=''>Qiita Zine</a></li>
                <li><a href=''>Qiita Blog</a></li>
            </ul>
        </details>
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('ユーザー登録') }}</a>
                        </li>
                    @endif
                @else
                    {{-- <li class="nav-item dropdown"> --}}
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>


                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type='submit'>ログアウト</button>
                        </form>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>


                        </div>
                    {{-- </li> --}}
                @endguest
            </ul>
        </div>
    </div>
</nav>

<main class="py-4">
    @yield('content')
    @yield('home')
    @yield('draft')
    @yield('edit')
</main>
</div>
    </header>

    <footer>
        <div>
            <h1>Qitta</h1>
            <p>How developers code is here.</p>
            <ul class="follow-me">
                <li><a href="https://twitter.com"></a></li>
                <li><a href="https://www.facebook.com"></a></li>
                <li><a href="/feed"></a></li>
            </ul>
            <p>© 2011-2021 Increments Inc.</p>
        </div>
        <div>
            <p>Qiita</p>
            <a href=''>About</a>
            <a href=''>利用規約</a>
            <a href=''>プライバシー</a>
            <a href=''>ガイドライン</a>
            <a href=''>デザインガイドライン</a>
            <a href=''>リリース</a>
            <a href=''>API</a>
            <a href=''>ご意見</a>
            <a href=''>ヘルプ</a>
            <a href=''>広告掲載</a>
        </div>
        <div>
            <p>Increments</p>
            <a href=''>About</a>
            <a href=''>採用情報</a>
            <a href=''>ブログ</a>
            <a href=''>Qiita Team</a>
            <a href=''>Qiita Jobs</a>
            <a href=''>Qiita Zine</a>
        </div>
        @yield('footer')
    </footer>

</body>
