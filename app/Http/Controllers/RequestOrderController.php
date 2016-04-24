<?php

namespace App\Http\Controllers;

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
		$ro = RequestOrder::with(['detail_ro'])->get();
		$title = "Request Order";
		$this->data['ro'] = $ro;
		$this->data['title'] = $title;

		return view("content.staff.request_order.list",$this->data);
	}

	public function create(){
		$title = "Create Request Order";
		$this->data['title'] = $title;
		$this->data['products'] = $this->get_product();

		return view("content.staff.request_order.create",$this->data);
	}

	public function show($id,$no_ro){

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

	public function edit($id,$no_ro){
		$category = Category::find($id);
		$subcategory = Subcategory::where(["cat_id" => $id])->get();
		$title = "Category Edit - ($category->cat_name)";
		$this->data['category'] = $category;
		$this->data['title'] = $title;
		$this->data['subcategory'] = $subcategory;

		return view("content.administrator.request_order.edit",$this->data);
	}

	public function update($id,CategoryRequest $request){
		$category = Category::find($id);
		$category->cat_name = $request->cat_name;
		$category->save();

		foreach($request->sub_cat as $item){
			$subcategory = new Subcategory();
			$subcategory->sub_cat_name = $item;
			$subcategory->cat_id = $id;
			$subcategory->save();
		}

		Session::flash("success","Category has beed updated");
		return redirect('category');
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

	private function get_product(){
		$products = Product::all();
		$result = [];
		foreach ($products as $product) {
			$result[$product->id] = $product->p_name;
		}

		return $result;
	}
}
