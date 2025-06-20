<?php
// ★ルーティングするところ★

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ShopsController;
<<<<<<< HEAD
use App\Http\Controllers\ProductsController;
=======
>>>>>>> master
use App\Http\Controllers\Auth\AuthController;

/*
|--------------------------------------------------------------------------
|ログイン画面
|--------------------------------------------------------------------------
*/  
Route::group(['middleware' =>['guest']],function(){

    Route::get('/loginpage',[AuthController::class,'showLogin'])->name('showLogin');

    Route::post('/login',[AuthController::class,'login'])->name('login');

});
// guest:ログイン前のユーザのみこの2つにアクセスできる。

// ★会員登録成功画面
Route::get('/user/create/success',[UserController::class,'success'])->name('user.success');


/*
|--------------------------------------------------------------------------
|ホーム画面/ログアウト画面
|--------------------------------------------------------------------------
*/  
Route::group(['middleware' =>['auth']],function(){

Route::get('/home',function(){
     return view('login.home');
})->name('home');

// ログアウト
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

});
// auth:ログイン後のユーザのみこのページにアクセスできる。
// ⇒ログイン状態で/loginpageにアクセスしようとしても/homeにリダイレクトされる



/*
|--------------------------------------------------------------------------
|ホーム画面
|--------------------------------------------------------------------------
*/  
// routes/web.php
Route::get('/',[Controller::class,'index'])->name('mainindex');
    
// ホーム画面に戻る
Route::post('/',[Controller::class,'main'])->name('mainpage');


// routes/web.php
Route::get('/about', function () {
    // return 'このブログについて！';
    return view('about');
});



/*
|--------------------------------------------------------------------------
| データベース表示
|--------------------------------------------------------------------------
*/
// ★http~/shops をgetリクエストをするとShopsControllerのindexメゾットを呼び出す
Route::get('/shops','App\Http\Controllers\ShopsController@index')->name('shops.index');

// App\Http\Controllers\ShopsController@indexは
// [ShopsController::class,'index']みたいな感じ
// use App\Http\Controllers\ShopsController;を記述する必要がない。

// nameで'shops.index'と名前(ルート名)をつけることで
// $url = route('shops.index');でURL生成したりとか
// return redirect()->route('shops.index');でリダイレクトしたりとかできる。

/*
|--------------------------------------------------------------------------
| ユーザ新規登録画面
|--------------------------------------------------------------------------
*/
Route::get('/user/create',[UserController::class,'create'])->name('user.create');
Route::post('/user/input',[UserController::class,'store'])->name('user.input');



/*
|--------------------------------------------------------------------------
| ショップ新規登録画面
|--------------------------------------------------------------------------
*/
// Http~/shops/createにgetリクエストがあるとShopsController中のcreateメゾット(登録画面)が実行される。
Route::get('/shops/create','App\Http\Controllers\ShopsController@create')->name('shops.create');
// Http~/shops/storeにpostアクセスがあるとShopsController中のstoreメゾットが実行される。
Route::post('/shops/store','App\Http\Controllers\ShopsController@store')->name('shops.store');


/*
|--------------------------------------------------------------------------
| 登録削除
|--------------------------------------------------------------------------
*/

Route::get('/shops/edit/{shop}','App\Http\Controllers\ShopsController@edit')->name('shops.edit');
Route::put('/shops/edit/{shop}','App\Http\Controllers\ShopsController@update')->name('shops.update');

/*
|--------------------------------------------------------------------------
| ショップ個別ページ表示
|--------------------------------------------------------------------------
*/
Route::get('/shops/{id}',[ShopsController::class,'sales'])->name('shop.sale');

/*
|--------------------------------------------------------------------------
| ショップ個別編集ページ表示
|--------------------------------------------------------------------------
*/

Route::get('/shops/edit/{id}',[ShopsController::class,'shopedit'])->name('shop.edit');
Route::post('/shops/update/{id}',[ShopsController::class,'update'])->name('shop.update');

/*
|--------------------------------------------------------------------------                                                                                                                                   
| ショップ削除
|--------------------------------------------------------------------------
*/
Route::post('/shops/delete/{shopid}',[ShopsController::class,'delete'])->name('shop.delete');


/*
|--------------------------------------------------------------------------
| ユーザ個別ページ表示
|--------------------------------------------------------------------------
*/
Route::get('/user/{id}',[UserController::class,'parsonal'])->name('user.pasonal');


/*
|--------------------------------------------------------------------------
| 商品登録(店個別)ページ表示
|--------------------------------------------------------------------------
*/
Route::get('/product/{shopid}',[ProductsController::class,'create'])->name('product.create');
Route::post('/product/store/{shopid}',[ProductsController::class,'store'])->name('product.store');

/*
|--------------------------------------------------------------------------
| 商品編集個別ページ表示
|--------------------------------------------------------------------------
*/
Route::get('/product/edit/{shopid}/{productid}',[ProductsController::class,'edit'])->name('product.edit');
Route::post('/product/update/{shopid}/{productid}',[ProductsController::class,'update'])->name('product.update');

/*
|--------------------------------------------------------------------------
| 商品CSV出力
|--------------------------------------------------------------------------
*/
Route::get('/download-products/{shopid}',[ProductsController::class,'download'])->name('download.products');

/*
|--------------------------------------------------------------------------
| 商品個別ページ表示
|--------------------------------------------------------------------------
*/
Route::get('/pro/details/{productid}', [ProductsController::class, 'detail'])->name('product.detail');
// 商品購入
Route::post('/pro/purchase/{productid}', [ProductsController::class, 'purchase'])->name('product.purchase');

/*
|--------------------------------------------------------------------------                                                                                                                                   
| 商品削除
|--------------------------------------------------------------------------
*/

Route::post('/pro/delete/{productid}',[ProductsController::class, 'delete'])->name('product.delete');


?>