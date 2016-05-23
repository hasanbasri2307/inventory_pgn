<?php

namespace App\Http\Controllers;

use App\Stock;
use Auth;

class StockController extends Controller
{
    //
    public function index(){
    	if(Auth::user()->role=="staff" && (Auth::user()->dep_id == 7 or Auth::user()->dep_id==8)){
    		$stock = Stock::all();
    	}elseif(Auth::user()->role == "administrator"){
    		$stock = Stock::all();
    	}else{
    		$stock = Stock::where(['dep_id'=>Auth::user()->dep_id])->get();
    	}
    	
		$title = "Stock";
		$this->data['stocks'] = $stock;
		$this->data['title'] = $title;

		return view("content.master.stock.list",$this->data);
    }
}
