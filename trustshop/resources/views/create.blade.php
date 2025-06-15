@extends('app')
<!-- 入力フォームのページにはshopテーブルのデータは連携されていない
ここに連携されているのは選択肢に利用しているbunruisテーブルのデータ
※controllerのcreateメソッドで記載のもの -->

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size:1rem;">ショップ登録画面</h2>
        </div>
    </div>
</div>

<div style="text-align:left;">
<form action="{{ route('shops.store') }}" method="POST">
    @csrf
    <!--  POSTリクエストを利用するときに外部からの不正リクエストを防ぐ働き -->

    <div class="row">
        <!-- <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="id" class="form-control" placeholder="ID">
            </div>
            IDは入力しなくても自動的に連番になるの登録フォームは不要
        </div> -->
        <!-- <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="number" class="form-control" placeholder="No">
            </div> 
        </div> -->
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="ショップ名">
                @error('name')
                    <span style="color:red;">※ショップ名を30文字以内で入力してください。</span>
                @enderror
                <!-- 名前が入力されてないときにアラート出力する -->
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <textarea name="shosai" class="form-control" style="height:100px" placeholder="ショップ詳細を入力してください。"></textarea>
                @error('name')
                    <span style="color:red;">※ショップ詳細を入力してください。</span>
                @enderror
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <select name="shop_bunrui" class="form-select">
                    <option>分類を選択してください</option>
                    @foreach($bunruis as $bunrui)
                        <option value="{{ $bunrui->id }}">{{ $bunrui->koumoku }}</option>
                    @endforeach
                    
                </select>
            </div>
        </div>
        
            <div class="col-12 mb-2 mt-2">
                <button type="submit" class="btn btn-primary w-100">登録</button>
            </div>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ url('/shops') }}">▶ショップ一覧</a>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('user.pasonal',[Auth::user()->id] )}}">▶マイページに戻る</a>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ url('/') }}">▶ホームに戻る</a>
        </div>
</form>



</div>
@endsection('contents')