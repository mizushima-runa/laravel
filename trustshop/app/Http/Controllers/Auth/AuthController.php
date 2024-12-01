<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AuthController extends Controller
{
    /**
     * @return view
     */
    public function showLogin(){
        return view('login.login_form');
    }

    /**
     * @param App\Http\Requests\LoginFormRequest;
     * LoginFormRequestのパラメータです。LoginFormRequestにバリデーションの中身を記載しています。
     * LoginFormRequestを$requestという変数に入れています。
     */
    public function login(LoginFormRequest $request){
        $credentials = $request->only('email','password');
        
        // アカウントロックされているアカウントの場合は弾く
        $user = User::where('email','=',$credentials['email'])->first();
        // Userテーブルのemailと$credentials['email'](今入力されたもの)が同じデータを取ってくる
        // そのデータが存在すれば$userに入る、なければ$userはnull
        
        // ⓵$userがnullではない場合↓
        if (!is_null($user)){
                // ➁locked_flgが1の場合はエラーを返す。
            if($user->locked_flg === 1){
                return back()->withErrors([
                    'login_error' => 'アカウントがロックされています。',
                ]);
            }
            // ➂ 1と2が通過できたらログインになる。
            if(Auth::attempt($credentials)){
                $request->session()->regenerate();

                // ➃ログインしたらlocked_flggが0でない場合は0にする。
                if($user->error_count > 0){
                    $user->error_count = 0;
                    $user->save();
                }
                
                // ⓹ログイン成功
                return redirect()->route('home')->with('login_success','ログインが成功しました。');
            }
        }
        // $userがnullの場合↓ログイン失敗
        // ➅ログインに失敗した場合はeerror_countを1増やす。
        $user->error_count = $user->error_count + 1;

        // ➆eerror_countが6になった場合はアカウントロックをする⇒locked_flg = 1
        if($user->error_count > 5){
            $user->locked_flg = 1;
            $user->save();
            // ➇アカウントロックになった場合のエラーメッセージ
            return back()->withErrors([
                'login_error' => 'アカウントがロックされました。解除したい場合はお問い合わせください。',
            ]);
        }
        $user->save();

        return back()->withErrors([
            'login_error' => 'ログインに失敗しました。',
        ]);
    }


    /**
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Respons
     * 引き取るパラメータは$request、Respons⇒redirectを返す。
     */
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        // セッションを削除する
        $request->session()->regenerateToken();
        // セッションを作り直す。
        return redirect()->route('showLogin')->with('logout','ログアウトしました。');
        // /loginpageのgetメゾット
    }

}
