<?php

namespace App\Http\Controllers;

use App\Models\Shops;
use App\Models\Bunrui;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){

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
        ->get();
        // ->paginate(5);
        return view('welcome',['shops'=> $shops]);

    }

    public function main(){
        return redirect()->route('mainindex');
    }

    // public function index(){
    // $query = Item::query()->whereNull("deleted_at");
    // $items = $query->get();
    // return view("item.index",["items"=>$items]);
    // }
}
