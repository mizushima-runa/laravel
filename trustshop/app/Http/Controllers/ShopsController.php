<?php

namespace App\Http\Controllers;

use App\Models\Shops;
use App\Models\Bunrui;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ShopsController extends Controller
{



/*
|--------------------------------------------------------------------------
| ショップ一覧表示 ※このページは今使ってない※
|--------------------------------------------------------------------------
*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $shops = Shops::latest()->paginate(7);
        // shopsのデータを$shopsにいれる。paginate(7)の数字はデータの表示数
        // Shops::と記述しているのはモデルを作成しているから、作成していない場合はDB::tableで直接アクセスできる。

        $shops = Shops::select([
            'shops.id',
            'shops.user_id',
            'shops.name',
            'shops.description',
            'bunruis.koumoku as bunrui',

        ])
        ->from('shops')
        ->join('bunruis',function($join){
            $join->on('shops.shop_bunrui','=','bunruis.id');
        })
        ->orderby('shops.id','DESC')
        ->paginate(5);

        return view('index',compact('shops'));
        // ->with('i',(request()->input('page',1)-1)*5);
        
    }
// 
        // index.blade.phpをviewとして返す。


    

/*
|--------------------------------------------------------------------------
| ショップ登録ページ
|--------------------------------------------------------------------------
*/
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bunruis = Bunrui::all();
        return  view('create')
            ->with('bunruis',$bunruis);   
        // bunruisテーブルのデータを全部持ってくる⇒createのviewを表示するときにそのデータを渡す。
    }

/*
|--------------------------------------------------------------------------
| ショップ登録メソッド
|--------------------------------------------------------------------------
*/
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // フォームリクエストの検証(バリデーション)を行うためのメゾット↓以下が検証ルールになる。
                // 'id' => 'required|integer|between:25,99',
                // 'number' => 'required|digits:5',
                'name' => 'required|string|max:30',
                'shosai' => 'required|string|max:50',
                'shop_bunrui' => 'required|integer|between:1,5',
            ]); 
            $shop = new Shops; 
            // 新しいshopsモデルのインスタンス、DBに新しいレコードを挿入するための準備
            // この$shopがshopモデルのインスタンス、この中にデータを入れていく感じ
            // この時の$shopの項目はDBのカラム名と対応する。input()内はフォーム作成時のnameで指定したもの
            
            $shop->user_id = auth()->user()->id;
            $shop->name = $request->input("name");
            $shop->description = $request->input("shosai");
            $shop->shop_bunrui = $request->input("shop_bunrui");
            $shop->save();
    
            return redirect()->route('user.pasonal',['id'=>Auth::user()->id])->with('shopcreate_success','ショップが正常に作成されました。');
        
            // storeメゾッドの作業後shops.indexのページに戻る。
            // return redirect()->route('shops.index')->with('success', '登録が完了しました');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shops  $shops
     * @return \Illuminate\Http\Response
     */
    public function show(Shops $shops)
    {
        //
    }


/*
|--------------------------------------------------------------------------
| ショップ個別ページ表示
|--------------------------------------------------------------------------
*/
public function sales($id)
{
// $shop = Shops::with('bunrui')->find($id);
$shop = Shops::findOrFail($id);
$bunrui = Bunrui::findOrFail($shop->shop_bunrui);
$products = Product::where('shop_id',$id)->get();
// var_dump($shop);exit;

return view('shops.sale',  ['shop' => $shop, 'bunrui' => $bunrui, 'products'=>$products]);
}

/*
|--------------------------------------------------------------------------
| ショップ個別編集ページ表示
|--------------------------------------------------------------------------
*/
    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Shops  $shops
     * @return \Illuminate\Http\Response
     */
    public function edit(Shops $shops, $id)
    {
        $shop = Shops::findOrFail($id);
        // $bunrui = Bunrui::findOrFail($shop->shop_bunrui);
        $bunruis = Bunrui::all();
        return view('shops.shopedit',['id'=> $id,'shop'=> $shop,'bunruis'=> $bunruis]);
    }
    
    
/*
|--------------------------------------------------------------------------
| ショップ個別編集登録メソッド
|--------------------------------------------------------------------------
*/
    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shops  $shops
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shops $shops, $id)
    {
        $request->validate([
                'name' => 'required|string|max:30',
                'shosai' => 'required|string|max:50',
                'shop_bunrui' => 'required|integer|between:1,5',
            ]); 
            $shop = Shops::where('id', $id)->first();
            
            $shop->user_id = auth()->user()->id;
            $shop->name = $request->input("name");
            $shop->description = $request->input("shosai");
            $shop->shop_bunrui = $request->input("shop_bunrui");
            $shop->save();
    
            return redirect()->route('shop.edit',['id'=>$shop->id])->with('success','ショップ情報を変更しました。');
            // storeメゾッドの作業後shops.indexのページに戻る。
            // return redirect()->route('shops.index')->with('success', '登録が完了しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shops  $shops
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shops $shops)
    {
        //
    }

<<<<<<< HEAD
/*
|--------------------------------------------------------------------------
| ショップ削除メソッド
|--------------------------------------------------------------------------
*/
public function delete($shopid){
    $shop = Shops::withTrashed()->find($shopid);

    if($shop){
        $shop->delete();
        return redirect()->route('user.pasonal',['id'=>Auth::user()->id])->with('shopdelete_success','１件のショップを削除しました。');
    }else{
        return redirect()->route('user.pasonal',['id'=>Auth::user()->id])->with('shopdelete_error','削除に失敗しました。');
    }

}

=======
    // shop個々のページを作成
    public function sales($id)
{
    $shop = Shops::with('bunrui')->find($id);
    // dd($shop->bunrui); // bunrui データを確認
    return view('shops.sale', ["shop" => $shop]);
}

    // public function sales($id)
    // {
    //     $shop = Shops::with('bunrui')->find($id);
    //     if ($shop->bunrui) {
    //         dd($shop->bunrui->koumoku);
    //     } else {
    //         dd('bunrui リレーションが見つかりませんでした');
    //     }
    //     return view('shops.sale', ["shop" => $shop]);
    // }
    

>>>>>>> master
}
