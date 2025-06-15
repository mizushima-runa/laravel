<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品編集:{{ $product->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>


<body>
    <h2>商品編集:{{ $product->name }}</h2>

    <form action="{{ route('product.update',['shopid'=> $shop->id, 'productid'=> $product->id]) }}" method="POST">
    
    @csrf
    
        <div class="product-form-group">
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" placeholder="商品名">
                @error('name')
                    <span style="color:red;">※商品名を30文字以内で入力してください。</span>
                @enderror
        </div>
              
        <div class="product-form-group">
            <textarea name="description" class="form-control" style="height:100px" placeholder="商品詳細">{{ $product->description }}</textarea>
                @error('description')
                    <span style="color:red;">※商品詳細を入力してください。</span>
                @enderror
        </div>

        <div class="product-form-group">
            <input type="number" name="price" class="form-control" value="{{ $product->price }}" placeholder="価格">
                @error('price')
                    <span style="color:red;">※価格を入力してください。</span>
                @enderror
        </div>

        <div class="product-form-group">
            <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" placeholder="在庫数">
                @error('stock')
                    <span style="color:red;">※商品在庫数を入力してください。</span>
                @enderror
        </div>
            
    <div class="touroku">
        <p>   </p>
        <button type="submit" class="btn-nomal">登録</button>
    </form>
    </div>
    </form>

    <form action="{{ route('product.delete',['productid' => $product->id]) }}" method=POST >
    @csrf
        <p>   </p>
        <!-- <p>▽商品を削除する</p> -->
        <button type="submit" class="btn-delete">{{ $product->name }}を{{ $shop->name }}から削除する</button>
    </form>
    
    
    <div>
        <p>   </p>
        <a href="{{ route('user.pasonal',Auth::user()->id) }}">▶MyPage</a>
        <p>   </p>
        <a href="{{ url('/') }}">▶home</a>
    </div>
    
</body>
</html>
<!-- <?php
dd($product);
?> -->