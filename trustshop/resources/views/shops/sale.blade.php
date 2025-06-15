<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $shop->name }}</title>
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
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
                <h3>shop : {{ $bunrui->koumoku }} </h3>
            </div>
             
            <table>
            <th>商品一覧</th>
                <div>
                    <tr>
                        <th>name</th>
                        <th>:</th>
                        <th>description</th>
                        <th>:</th>
                        <th>price</th>
                        <th>:</th>
                        <th>stock</th>
                    </tr>
                    
                    @foreach ($products as $product) 
                    <tr>
                        <!-- <td style="text-align:left">{{ $product->name }}</td> -->
                        <td>
                        <a href="{{ route('product.detail', ['productid' => $product->id]) }}"> {{ $product->name }} </a>
                        </td>
                        <td style="text-align:left">:</td>
                        <td style="text-align:left">{{ $product->description }}</td>
                        <td style="text-align:left">:</td>
                        <td style="text-align:right">{{ $product->price }}</td>
                        <td style="text-align:left">:</td>
                        <td style="text-align:right">{{ $product->stock }}</td>
                        <td style="text-align:center">
                        <!-- <td style="text-align:center">
                            <a class="btn btn-primary" href="{{ route('shops.edit','$shop->id') }}">購入する</a>
                            このボタンを押すと'shops.edit'に飛んで$shopのidテータを渡す
                        </td> -->
                    </tr>
                    @endforeach 
            </table>                  
    </div>
    <div>
        <p>   </p>
        <a href="{{ route('user.pasonal',Auth::user()->id) }}">▶MyPage</a>
        <p>   </p>
        <a href="{{ url('/') }}">▶home</a>
    </div>

    </body>
</html>
<?php
// dd($shop);

?>