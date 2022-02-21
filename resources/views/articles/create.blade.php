<body>
    <div class="footerFixed">
        <header>
            @yield('header')
            <div class="header-top">
                <a href="/articles" class="title">Qiita</a>
                <form method='GET' action="/articles">
                    <input type="text" name="keyword" class="form-keyword" placeholder="キーワードを検索">
                    <a type="submit"></a>
                </form>
                @guest
                    @if (Route::has('login'))
                        <a class="user-login" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                    @endif
                    @if (Route::has('register'))
                        <a class="user-register" href="{{ route('register') }}">{{ __('ユーザー登録') }}</a>
                    @endif
                @else
                    <div class="menuparent">
                        <button type='button' class="openusermenu" onclick="openUserMenu()">
                            {{ Str::substr(Auth::user()->name, 0, 1) }}
                        </button>
                        <ul class="usermenu" id="usermenu">
                            <li><a href="">マイページ</a></li>
                            <li><a>ストックした記事</a></li>
                            <li><a href="/articles/create">新規投稿（記事）</a></li>
                            <li><a>新規投稿（質問）</a></li>
                            <li><a>下書き記事</a></li>
                            <li><a>限定共有記事</a></li>
                            <li><a>編集リクエスト</a></li>
                            <li><a>設定</a></li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type='submit'>ログアウト</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <a href="/articles/create" class="post">投稿する</a>
                @endguest
            </div>
            <div class="header-bottom">
                <a href="/articles" class="header-bottom-item header-home">ホーム</a>
                <a class="header-bottom-item ">タイムライン</a>
                <a class="header-bottom-item">トレンド</a>
                <a class="header-bottom-item">質問</a>
                <a class="header-bottom-item">Organization</a>
                <a class="header-bottom-item">イベント</a>
                <a class="header-bottom-item">Qiita Blog</a>
            </div>
        </header>
    </div>
    @auth
        <form method='POST' action="/articles">
            <div class='button'>
                @csrf
                <input name="title" class="articletitle" value="" placeholder="タイトル">
                <select name='tags_id' class="selecttag">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag['id'] }}">{{ $tag['title'] }}</option>
                    @endforeach
                </select>
                <textarea name="content" class="articlecontent" value="" placeholder="記事"></textarea>
                <input type="submit" name="submit" class="submitarticle" value="Qiitaに投稿">
                @if ($errors->any())
            </div>
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </form>
    @endauth

    @guest
        <h1>ログインが必要です</h1>
        <a href="/login">ログイン</a>
        <a href="/register">会員登録</a>
    @endguest
</body>

<style type="text/css">
    .articletitle {
        width: 99%;
        height: 45px;
        padding: 5px 10px;
        margin: 5px 1px;
        border-radius: 5px;
        border-style: solid;
        border-width: 1px;
        border-color: #0099FF;
    }

    .selecttag {
        width: 100%;
        height: 30px;
        padding: 3px 10px;
        margin: 0 1px 10px 1px;
        border-radius: 5px;
        border-style: solid;
        border-width: 1px;
        border-color: peachpuff;
    }

    .articlecontent {
        width: 100%;
        height: 80%;
    }

    .submitarticle {
        height: 40px;
        width: 100px;
        background-color: #55c500;
        border-style: solid;
        border-width: 1px;
        color: white;
        border-color: #55c500;
        margin: 5px 0;
    }

    header {
        height: 90px;
        padding: 5px 8%;
        background-color: #55c500;
        color: #fff;
    }

    .header-top {
        display: flex;
        align-items: flex-start;
        height: 40px;
        top: 5px;
    }

    .title {
        color: #fff;
        height: 40px;
        font-size: 30px;
        flex-basis: 65%;
    }

    .form-keyword {
        height: 40px;
        width: 340px;
        border-style: solid;
        border-width: 2px;
        border-color: white;
        flex-basis: 25%;
    }

    .post {
        border-radius: 5%;
        font-size: 10pt;
        text-align: center;
        cursor: pointer;
        padding: 10px 5px;
        background: #006633;
        color: #ffffff;
        height: 20px;
        width: 80px;
        margin-left: 10px;
    }
    }

    .openusermenu {
        background: green;
        color: #ffffff;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        text-align: center;
        flex-basis: 3%;
        margin: 10px;
    }

    .usermenu {
        list-style-type: none;
        background: #fff;
        color: black;
        position: absolute;
        width: 210px;
        flex-basis: 7%;
    }

    .userparent {
        position: relative;
    }

    li {
        padding: 10px;
    }

    .user-login {
        border-radius: 5%;
        flex-basis: 8%;
        font-size: 10pt;
        text-align: center;
        cursor: pointer;
        padding: 12px 12px;
        color: #ffffff;
        height: 40px;
        width: 80px;
        top: 4px;
        left: 520px;
    }

    .user-register {
        border-radius: 5%;
        font-size: 10pt;
        text-align: center;
        cursor: pointer;
        padding: 10px 5px;
        border-color: #ffffff;
        border-style: solid;
        border-width: 2px;
        color: #ffffff;
        height: 40px;
        width: 100px;
        flex-basis: 8%;
    }

    .header-bottom {
        height: 40px;
        display: flex;
        align-items: flex-start;
    }

    .header-bottom-item {
        padding: 8px 12px;
        color: white;
        height: 40px;
    }

    .header-home {
        padding-left: 0;
    }

</style>

<script>
    document.getElementById("usermenu").style.display = "none";
    // function openUserMenu(){
    //     document.getElementById("usermenu").style.display = 'block';
    // }
    function openUserMenu() {
        const usermenu = document.getElementById("usermenu");
        if (usermenu.style.display == "block") {
            usermenu.style.display = "none";
        } else {
            usermenu.style.display = "block";
        }
    }
</script>
