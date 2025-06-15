<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログインホーム画面</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="mt-5">
            

            <!-- @if (session('login_success'))
            もしlogin_successというセッションがわたってきていたら
                <div class="alert alert-success">
                    {{ session('login_success') }}
            AuthControllerの>with('login_success','ログインが成功しました。')を実行する。
                </div>
            @endif -->
            <x-alert type="success" :session="session('login_success')"/>


            <h3>ログイン中ユーザ情報</h3>
            <ul>
                <il>名前：{{ Auth::user()->name }}様</il>
                <il>メールアドレス：{{ Auth::user()->email }}</il>
                <!-- userモデル(user.php)のnameとemailにアクセスしたという感じ -->
            </ul>
            <form action="{{ route('mainpage') }}" method="POST">
                @csrf
                <button class="btn btn-danger">ホームに戻る</button>
            </form>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-danger">ログアウト</button>
            </form>
        </div>    
    </div>
</body>
</html>

