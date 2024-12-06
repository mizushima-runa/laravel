<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $shop->name }}</title>
    </head>
    <body>
    <div class="row">
            <dev class="col-ig-12">
                <h2 style="font-size:2rem;">{{ $shop->name }}</h2>
            <div>
            <div class="text-gray-600 text-sm">
                {{ $shop->description }}
            </div> 
            <div class="text-right">
                <h3>shop : {{ optional($shop->bunrui)->koumoku }} </h3>
                <a class="btn btm-success" href="#">新規登録</a>
                {{ optional($shop->bunrui)->id }} 
            </div>
            <th>商品一覧</th>
            </div>
    </body>
</html>