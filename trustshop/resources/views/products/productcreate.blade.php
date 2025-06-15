<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品登録:{{ $shop->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h3>{{ $shop->name }}</h3>

        @if(session('delete_success'))
            <div style="color:red;">
                {{session('delete_success')}}
            </div>
        @endif
        @if(session('delete_error'))
            <div style="color:red;">
                {{session('delete_error')}}
            </div>
        @endif

    <p>商品登録・編集ページ 下記フォームより商品をご登録ください。</p>

    <form action="{{ route('product.store',['shopid' => $shop->id]) }}" method="POST">
        @csrf
            <div class="product-form-group">
                <input type="text" name="name" class="form-control" placeholder="商品名">
                    @error('name')
                        <span style="color:red;">※商品名を30文字以内で入力してください。</span>
                    @enderror
            </div>
                
            <div class="product-form-group">
                <textarea name="description" class="form-control" style="height:100px" placeholder="商品詳細"></textarea>
                    @error('description')
                        <span style="color:red;">※商品詳細を入力してください。</span>
                    @enderror
            </div>

            <div class="product-form-group">
                <input type="number" name="price" class="form-control" placeholder="価格">
                    @error('price')
                        <span style="color:red;">※価格を入力してください。</span>
                    @enderror
            </div>

            <div class="product-form-group">
                <input type="number" name="stock" class="form-control" placeholder="在庫数">
                    @error('stock')
                        <span style="color:red;">※商品在庫数を入力してください。</span>
                    @enderror
            </div>
                
        <div class="touroku">
            <button type="submit" class="btn-nomal">登録</button>
        </div>

        
        <table>
            @if(session('success'))
                <div style="color:red;">
                    {{ session('success') }}
                </div>
            @endif

            <th>▽登録済商品一覧</th>
                
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
                        <td style="text-align:left">{{ $product->name }}</td>
                        <td style="text-align:left">:</td>
                        <td style="text-align:left">{{ $product->description }}</td>
                        <td style="text-align:left">:</td>
                        <td style="text-align:right">{{ $product->price }}</td>
                        <td style="text-align:center">
                        <td style="text-align:right">{{ $product->stock }}</td>
                        <td style="text-align:center">
                            <a class="btn btn-primary" href="{{ route('product.edit',['shopid' => $shop->id, 'productid' => $product->id]) }}">編集する</a>
                            <!-- このボタンを押すと'shops.edit'に飛んで$shopのidテータを渡す -->
                            </td>
                    </tr>
                    @endforeach 
                </div>
        </table>

    </form>

    <div>
       
        
       <a href="{{ route('download.products',['shopid' => $shop->id]) }}">
           <button class="btn-nomal">CSV出力</button>
       </a>
    </div>   

   <div>
       <p>   </p>
       <a href="{{ url('/user/'.Auth::user()->id) }}">▶MyPage</a>
       <p>   </p>
       <a href="{{ url('/') }}">▶home</a>
   </div>

</body>
</html>