<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <title>ユーザ登録</title>
    </head>
    <body>
        <div class="container">
        <h1 style="font=size:1.25rem;">ユーザ登録画面</h1>
           
        </div>

        <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size:1rem;">新規会員登録いただきありがとうございます。</h2>
            <h2 style="font-size:1rem;">下記フォームにご入力くださいませ。</h2>
        </div>
    </div>
</div>

<div style="text-align:left;">
<form action="{{ route('user.input') }}" method="POST">
    @csrf
    <!--  POSTリクエストを利用するときに外部からの不正リクエストを防ぐ働き -->

    <div class="row">

     
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
            <label for="name">Name</label>
                <input type="text" name="name" class="form-control" placeholder="名前">
                @error('name')
                <span style="color:red;">名前を30文字以内で入力してください。</span>
                @enderror
                <!-- 名前が入力されてないときにアラート出力する -->
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
            <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="メールアドレス">
                @error('email')
                <span style="color:red;">メールアドレスを入力してください。</span>
                @enderror
            </div>
        </div>

        <form method="POST" action="/register">
            @csrf
            <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="任意のパスワード">

             <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation">
                @error('password')
                <span style="color:red;">入力してください。</span>
                @enderror
        </form>

        
        
            <div>
                <button type="submit" class="btn-nomal">登録</button>
            </div>

        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('showLogin') }}">▶戻る</a>
        </div>
</form>



</div>




        <script src="#"></script>
    </body>
</html>