<?php

namespace App\Http\Controllers;

use App\Detailrab;
use Illuminate\Http\Request;

use App\Http\Requests\RequestOrderRequest;
use Session;
use App\RequestOrder;
use App\DetailRO;
use App\Product;
use Nomor;
use Auth;

class RequestOrderController extends Controller
{
    //
    public function index(){
    	if(Auth::user()->role == "staff" and Auth::user()->dep_id == "8"){
    		$ro = RequestOrder::with(['detail_ro'])->get();
    	}elseif(Auth::user()->role =="administrator"){
    		$ro = RequestOrder::with(['detail_ro'])->get();
    	}else{
    		$ro = RequestOrder::with(['detail_ro'])->where('req_by','=',Auth::user()->id)->get();
    	}
		
		$title = "Request Order";
		$this->data['ro'] = $ro;
		$this->data['title'] = $title;

		return view("content.transaksi.request_order.list",$this->data);
	}

	public function create(){
		$title = "Create Request Order";
		$this->data['title'] = $title;
		$this->data['products'] = $this->get_product();

		return view("content.transaksi.request_order.create",$this->data);
	}

	public function show($id){
		$ro = RequestOrder::find($id);
		$this->data['title'] = "Invoice - $ro->no_ro";
		$this->data['ro'] =$ro;
		return view("content.transaksi.request_order.invoice",$this->data);
	}

	public function save(RequestOrderRequest $request){

		$ro = new RequestOrder();
		$ro->no_ro  = Nomor::getNomor("request_order","no_ro","RO");
		$ro->date_ro = $request->date_ro;
		$ro->req_by = Auth::user()->id;
		$ro->dep_id = Auth::user()->department->id;
		$ro->status_ro = 0;

		$ro->save();

		foreach($request->products as $key => $item){
			$detail_ro = new DetailRO();
			$detail_ro->ro_id = $ro->id;
			$detail_ro->product_id = $item;
			$detail_ro->qty_req = $request->qty[$key];
			$detail_ro->qty_approve = 0;
			$detail_ro->save();
		}

		Session::flash("success","Request order has beed created");
		return redirect('request-order');
	}

	public function edit($id){
		$ro = RequestOrder::find($id);
		$title = "Request Order Edit - ($ro->no_ro)";
		$detail_ro = DetailRO::where("ro_id","=",$id)->get();
		$this->data['detail_ro'] = $detail_ro;
		$this->data['products'] = $this->get_product();
		$this->data['title'] = $title;
		$this->data['ro'] = $ro;
		return view("content.transaksi.request_order.edit",$this->data);
	}

	public function update($id,RequestOrderRequest $request){
		$ro = RequestOrder::find($id);

		

		$ro->status_ro = $request->status_ro;
		if($request->status_ro == 2){
			$ro->reject_reason = $request->reject_reason;
		}

		$ro->save();

		Session::flash("success","Request order has beed updated");
		return redirect('request-order');
	}

	public function delete_sub($id,Request $request){
		if($request->ajax()){
			$subcategory = Subcategory::find($id);
			$subcategory->delete();

			return response()->json(['status'=>true]);
		}
	}

	public function save_sub(Request $request){
		$subcategory = Subcategory::find($request->id);
		$subcategory->sub_cat_name = $request->sub_cat_name;
		$subcategory->save();

		return response()->json(['status'=>true]);
	}

	public function delete($id){
		$category = Category::find($id);
		$category->delete();

		Session::flash("success","Category has beed deleted");
		return redirect('category');
	}

	public function detail($id){
		$ro = RequestOrder::with(['detail_ro'])->find($id);
		$view = view("content.transaksi.request_order.detail",['ro'=>$ro])->render();
		return response()->json(['view'=>$view,'status'=>true]);
	}

	private function get_product(){
		$products = Product::all();
		$result = [];
		foreach ($products as $product) {
			$result[$product->id] = $product->p_name;
		}

		return $result;
	}
}
