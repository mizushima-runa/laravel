<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div>
        <h1>{{ $shop->name }}</h1>
        <h3>{{ $product->name }}</h3>
        <p>{{ $product->description }}</p>
        <p>価格：{{ $product->price }}円</p>
        <p>在庫数：{{ $product->stock }}個</p>
        
        <div>
        <p>   </p>
        
        @if($shop->user_id == $user->id)
            <p style="color: red;">※あなたの商品です。※</p>
        @elseif($product->stock > 0)
            <form action="{{ route('product.purchase',['productid'=> $product->id]) }}" method="POST">
            @csrf
                <button type="submit" class="btn-nomal">購入する</button>
            </form>
        @else
            <p>SOLD OUT</p>
            <button type="button" class="btn-nomal" disabled>購入する</button>
        @endif
        </div>

    </div>

        <p></p>

    <div>
        <p>   </p>
        <a href="{{ route('shop.sale',['id'=>$shop->id]) }}">▶ShopPage</a>
        <p>   </p>
        <a href="{{ url('/') }}">▶home</a>
    </div>
</body>
</html> 

