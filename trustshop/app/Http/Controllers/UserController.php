<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Shops;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    |会員登録成功画面
    |--------------------------------------------------------------------------
    */  
    public function success(){
        return view('login.usersuccess');
    }

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
    public function create()
    {
        return view('usercreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validatedData = $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|string|email|max:250|unique:users,email',
            'password' => 'required|string|min:8|max:15|confirmed',
       ]);

            $user = new User();
            $user->name = $request->input("name");
            $user->email = $request->input("email");
            $user->password = bcrypt($request->input("password"));
            // passwordはハッシュ化(bcrypt関数)する必要がある
            $user->save();

            return redirect('/user/create/success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function parsonal($id){
        $user = User::findOrFail($id);
        $shops = Shops::where('user_id', $id)->get();
        // dd($shops);
        $today = date('Y-m-d');
        return view('users.parsonal',['user'=>$user,'shops'=>$shops,'today'=>$today]);
    }

    


}
