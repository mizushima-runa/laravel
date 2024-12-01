@extends('app');
<!-- app.blade.phpを引き継いでいる -->
<!-- http~/shopsを検索するとapp.blade.phpの内容に下のcontentが追加されたものが表示される。 -->
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="text-left">
                <h2 style="font-size:1rem;">当サイトに登録されているショップ一覧 ※最新の登録ショップから表示</h2>
            </div>
            <div class="text-right">
            <a class="btn btn-success" href="{{ route('shops.create') }}">新規登録</a>
            <!-- 新規登録を押すとshops.create⇒ShopsControllerのcreateメゾットになる。 -->
            </div>
        </div>
    </div>
    
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>No</th>
            <th>name</th>
            <th>shousai</th>
            <th>bunrui</th>
        </tr>
        @foreach ($shops as $shop)
        <tr>
            <td style="text-align:right">{{ $shop->id }}</td>
            <td>{{ $shop->user_id }}</td>
            <td style="text-align:right">{{ $shop->name }}</td>
            <td style="text-align:right">{{ $shop->description }}</td>
            <td style="text-align:right">{{ $shop->bunrui }}</td>
            <td style="text-align:center">
                <a class="btn btn-primary" href="{{ route('shops.edit','$shop->id') }}">変更</a>
                <!-- このボタンを押すと'shops.edit'に飛んで$shopのidテータを渡す -->
            </td>
        <tr>
        @endforeach
        
    </table>
   

    {!! $shops->links('pagination::bootstrap-4') !!}
    <!-- laravel8以降はbootstrap-5をサポートしている、laravel7以前はbootstrap-4を指定する -->
    
    @endsection
<!-- ＠section~＠endsection が app.blade.phpの@:yield('content')に反映される。 -->