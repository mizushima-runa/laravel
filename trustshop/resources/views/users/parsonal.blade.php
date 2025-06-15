    <!DOCTYPE html>
    <html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ユーザ：{{ $user->name }}様 専用ページ</title>
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>
        <body>
            <p>今日は{{ $today }}</p>
            <h3>{{ $user->name }} 様</h3>

            @if(session('shopdelete_success'))
                <div style="color:red;">
                    {{ (session('shopdelete_success')) }}
                </div>
            @endif
            @if(session('shopdelete_error'))
                <div style="color:red;">
                    {{ (session('shopdelete_error')) }}
                </div>
            @endif
            @if(session('shopcreate_success'))
                <div style="color:blue;">
                    {{ (session('shopcreate_success')) }}
                </div>
            @endif
            

            <div>
                <p>{{ $user->name }}様のショップ一覧</p>
            </div>
            
          
            <div>
                <!-- <h1>Shop List</h1>  -->
                    <ul> @foreach ($shops as $shop) 
                        <li> 
                            <a href="{{ route('shop.sale', ['id' => $shop->id]) }}"> {{ $shop->name }} </a> 
                        </li> 
                        @endforeach 
                    </ul>
            </div>
            

            <div class="text-right">
                <a class="btn btn-success" href="{{ route('shops.create') }}">▶新規ショップ登録はこちら</a>
                <!-- 新規登録を押すとshops.create⇒ShopsControllerのcreateメゾットになる。 -->
            </div>

            <div>
                <p>▶ショップ編集/削除はこちら</p>
                <ul> @foreach ($shops as $shop) 
                    <li> 
                        <a href="{{ route('shop.edit', ['id' => $shop->id]) }}"> ショップ編集：{{ $shop->name }} </a> 
                    </li> 
                    @endforeach 
                </ul>

            </div>
            
            <div>
                <p>▶新規商品登録はこちら</p>
                <ul> @foreach ($shops as $shop) 
                    <li> 
                        <a href="{{ route('product.create', ['shopid' => $shop->id]) }}"> 商品編集：{{ $shop->name }} </a> 
                    </li> 
                    @endforeach 
                </ul>
            </div>

            
            <div>
                <!-- <p>   </p>
                <a href="{{ url('/product/details') }}">▶syouhin</a>
                <p>   </p> -->
                <a href="{{ url('/') }}">▶home</a>
            </div>
            
        </body>
    </html>
