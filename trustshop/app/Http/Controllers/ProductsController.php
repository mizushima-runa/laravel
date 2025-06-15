<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($shopid)
    {
        $shop = Shops::findOrFail($shopid);
        $products = Product::where('shop_id',$shopid)->get();
        // dd($products);
        return view('products.productcreate',['shopid'=>$shopid,'shop'=>$shop,'products'=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $shopid)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'description'=> 'required|string|max:150',
            'price' => 'required|integer',
            'stock'=>'required|integer'
        ]);

        $product = new Product();

        $product->shop_id = $shopid;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->save();

        return redirect()->route('product.create',['shopid' => $shopid])->with('success','商品を登録しました。');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($shopid, $productid)
    {
        $shop = Shops::findOrFail($shopid);
        $product = Product::findOrFail($productid);
        // dd($productid);
        return view('products.productedit',['product'=>$product, 'shop'=>$shop, 'productid'=>$productid ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $shopid, $productid)
{
    // バリデーション
    $request->validate([
        'name' => 'required|string|max:30',
        'description' => 'required|string|max:150',
        'price' => 'required|integer',
        'stock' => 'required|integer'
    ]);

    // $productidを使用して商品のレコードを取得
    // 見つからない場合は 404 になるようにしたい場合は firstOrFail() を使います
    // $product = Product::where('id', $productid)->firstOrFail();

    $product = Product::where('id', $productid)->first();

    // 値を更新
    $product->shop_id    = $shopid;
    $product->name       = $request->input('name');
    $product->description= $request->input('description');
    $product->price      = $request->input('price');
    $product->stock      = $request->input('stock');
    $product->save();

    // 編集が終わったらリダイレクト
    return redirect()
        ->route('product.create', ['shopid' => $shopid])
        ->with('success', '商品を編集しました。');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

/*
|--------------------------------------------------------------------------
| 商品詳細ページ
|--------------------------------------------------------------------------
*/
    public function detail($productid) 
    {
        $product = Product::findOrfail($productid);
        $user = auth()->user();
        // $shop = Shops::where('id',$product->shop_id)->get();
        $shop = Shops::findOrfail($product->shop_id);
         return view('products.productdetail',['productid'=> $productid,'product'=> $product,'shop'=> $shop, 'user'=> $user]);
    }
/*
|--------------------------------------------------------------------------
| 商品購入メソッド
|--------------------------------------------------------------------------
*/
public function purchase(Request $request, $productid){
    $product = Product::where('id', $productid)->first();

    if($product && $product->stock > 0){
        $product->stock -= 1;
        $product->save();
        return redirect()
        ->route('product.detail', ['productid'=> $product->id])
        ->with('success', '商品を購入しました。');
    }else{
        return redirect()
        ->route('product.detail', ['productid'=> $product->id])
        ->with('error', '在庫数が不足しています。');
    }

}

/*
|--------------------------------------------------------------------------
| 商品CSV出力
|--------------------------------------------------------------------------
*/
public function download($shopid){

    // $products = Product::all();
    
    $products = Product::where('shop_id',$shopid)->get();

    $filename = "products-".date('Ymd_His').".csv";
    
    $handle = fopen($filename,'w+');

    fputcsv($handle,['商品名','商品説明','価格','在庫数']);
    foreach($products as $product){
        fputcsv($handle,[$product->name,$product->description,$product->price,$product->stock]);
    }
    fclose($handle);

    $headers = [
        'Content-Type' => 'text/csv',
    ];
    
    return Response::download($filename,$filename,$headers);
}
// 
/*
|--------------------------------------------------------------------------
| 商品削除
|--------------------------------------------------------------------------
*/
public function delete($productid){
    
    $product = Product::withTrashed()->find($productid);
    
    if($product){
        $product->delete();
        return redirect()->route('product.create', ['shopid'=> $product->shop_id])->with('delete_success','商品が削除されました。');
    }else{
        return redirect()->route('product.create', ['shopid'=> $product->shop_id])->with('delete_error','該当の商品が見つかりませんでした。');
    }
}

}
