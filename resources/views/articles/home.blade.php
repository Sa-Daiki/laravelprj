@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>How developers code is here.</h1>
        <p>Qiitaは、エンジニアリングに関する知識を記録・共有するためのサービスです。コードを書いていて気づいたことや、自分がハマったあの仕様について、他のエンジニアと知見を共有しましょう</p>
        <a>GitHub</a>
        <a>Twitter</a>
        <a>Google</a>
        <p>ユーザー名<input type="text" name="quittan"></p>
        <p>メールアドレス<input type="text" name="auitan@quita.com"></p>
        <p>パスワード<input type="passward" value=""></p>
        <p>８文字以上、英・数・記号が使えます</p>
            <input type="checkbox" name="terms" value="">利用規約に同意する
            <input type="checkbox" name="policy" value="">プライバシーポリシーに同意する
            <input type="submit" value="登録する">
            {{-- <?php public PDO::errorInfo(): array> --}}
    </div>
<aside>
    <p>記事フィード</p>
     <a>トレンド</a>
    <p>質問フィード</p>
     <a>トレンド</a>
     <a>回答募集中</a>
     <a>新着</a>
</aside>
<main>
    <p>トレンド</p>
    <p>全て</p>
    <p>タグ</p>
</main>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    @endsection
