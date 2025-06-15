<!DOCTYPE html>
<html lang="ja">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style type="text/css">
    body{
        font-family: "Helvetica Neue",
            Arial,
            "Hiragino Kaku Gothic ProN",
            "Hiragino Sans",
            Meiryo,
            sans=serif
    }
    </style>
    <title>ショップ登録</title>
    </head>
    <body>
        <div class="container">
        <h1 style="font=size:1.25rem;">ショップ登録</h1>
            @yield('content')
            <!-- ※app.blade.phpを引き継ぐファイルに継承される -->
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrsp.min/css"></script>
    </body>
</html>
