<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログインフォーム</title>
<!--  scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

<!-- styles -->
 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 <link href="{{ asset('css/signin.css') }}" rel="stylesheet">

</head>
<body>
   <form class="form-signin" method="POST" action="{{ route('login') }}">
    @csrf
  <h1 class="h3 mb-3 font-weight-normal">ログインフォーム</h1>
    @foreach ($errors->all() as $error)
      <ul class="alert alert-danger">
          <li>{{ $error }}</li>
      </ul>
    @endforeach

    <!-- @if (session('login_error'))
            もしlogin_errorというセッションがわたってきていたら -->
      <!-- <div class="alert alert-denger"> -->
        <!-- {{ session('login_error') }} -->
            <!-- AuthControllerの'email' => 'The provided credentials do not match our records.',を実行する。 -->
      <!-- </div> -->
    <!-- @endif-->
    <x-alert type="danger" :session="session('login_error')"/>


    <!-- Alert.blade.phpに送る -->
    <x-alert type="danger" :session="session('logout')"/>

  <!-- <label for="inputEmail" class="sr-only">Email address</label> -->
  <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address"  autofocus>
  <!-- required -->
 
  <!-- <label for="inputPassword" class="sr-only">Password</label> -->
  <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" >
  <!-- required -->
  
  
  <button class="btn btn-lg btn-primary btn-block" type="submit">ログイン</button>
 
</form> 
</body>
</html>