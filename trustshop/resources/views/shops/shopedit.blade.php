<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ショップ編集:{{ $shop->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    
    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif


    <p>{{ $shop->name }}編集ページ</p>
    
    <form action="{{ route('shop.update',['id'=> $shop->id]) }}" method="POST">
    
    @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control" value="{{ $shop->name }}" placeholder="ショップ名">
                @error('name')
                    <span style="color:red;">※ショップ名を30文字以内で入力してください。</span>
                @enderror
                <!-- 名前が入力されてないときにアラート出力する -->
            </div>
        
        
            <div class="form-group">
                <textarea name="shosai" class="form-control" style="height:100px" placeholder="ショップ詳細を入力してください。">{{ $shop->description }}</textarea>
                @error('shosai')
                    <span style="color:red;">※ショップ詳細を入力してください。</span>
                @enderror
            </div>
        
        
            <div class="form-group">
                <select name="shop_bunrui" class="form-select">
                    <!-- <option>※分類を選択してください。</option> -->
                    @foreach($bunruis as $bunrui)
                        <option value="{{ $bunrui->id }}">{{ $bunrui->koumoku }}</option>
                    @endforeach                      
                </select>
                @error('shop_bunrui')
                <span style="color:red;">※分類を選択してください。</span>
                @enderror
            </div>
            <!-- <p>現在の項目：{{ $bunrui->koumoku }}※分類を選択してください。</p> -->
        
        <button type="submit" class="btn-nomal">登録</button>
    </form>

    <form action="{{ route('shop.delete',['shopid' => $shop->id]) }}" method=POST >
    @csrf
        <p>   </p>
        <p>   </p>
        <button type="submit" class="btn-delete">{{ $shop->name }}を削除する</button>
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
dd($bunrui);
?> -->
