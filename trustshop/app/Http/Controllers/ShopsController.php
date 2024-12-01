<?php

namespace App\Http\Controllers;

use App\Models\Shops;
use App\Models\Bunrui;
use Illuminate\Http\Request;

class ShopsController extends Controller
{
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
            $join->on('shops.bunrui','=','bunruis.id');
        })
        ->orderby('shops.id','DESC')
        ->paginate(5);


        return view('index',compact('shops'))->with('i',(request()->input('page',1)-1)*5);
        // index.blade.phpをviewとして返す。
    }

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
            'number' => 'required|digits:5',
            'name' => 'required|string|max:30',
            'shosai' => 'required|string|max:50',
            'bunrui' => 'required|integer|between:1,5',
        ]); 
        $shop = new Shops; 
        // 新しいshopsモデルのインスタンス、DBに新しいレコードを挿入するための準備
        // この$shopがshopモデルのインスタンス、この中にデータを入れていく感じ
        $shop->id = $request->input("id");
        // この時の$shopの項目はDBのカラム名と対応する。input()内はフォーム作成時のnameで指定したもの
        $shop->user_id = $request->input("number");
        $shop->name = $request->input("name");
        $shop->description = $request->input("shosai");
        $shop->bunrui = $request->input("bunrui");
        $shop->save();

        return redirect()->route('shops.index');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shops  $shops
     * @return \Illuminate\Http\Response
     */
    public function edit(Shops $shops)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shops  $shops
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shops $shops)
    {
        //
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
}
