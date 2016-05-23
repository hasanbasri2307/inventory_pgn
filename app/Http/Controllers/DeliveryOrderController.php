<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\DeliveryOrderRequest;
use Session;
use App\PurchaseOrder;
use App\DeliveryOrder;
use App\DetailDO;
use App\Product;
use Nomor;
use Auth;
use App\Stock;
use File;

class DeliveryOrderController extends Controller
{
    //
	public function index(){
		$do = DeliveryOrder::with(['detail_do'])->get();
		$title = "Delivery Order";
		$this->data['do'] = $do;
		$this->data['title'] = $title;

		return view("content.transaksi.delivery_order.list",$this->data);
	}

	public function create(){
		$title = "Create Delivery Order";
		$po = PurchaseOrder::where("status_po","=",0)->get();
		$this->data['title'] = $title;
		$this->data['po'] = array_pluck($po,"no_po","id");

		return view("content.transaksi.delivery_order.create",$this->data);
	}

	public function save(DeliveryOrderRequest $request){
		$do = new DeliveryOrder();
		$do->no_do = Nomor::getNomor("delivery_order","no_do","DO");
		$do->do_date = $request->do_date;
		$do->po_id = $request->po_id;
		$do->description = $request->description;
		
		if ($request->file('file_do')->isValid()) {
			//
			$filename = md5(time().$request->file('file_do')->getClientOriginalName());
			$destinationPath = public_path('uploaded');
			$request->file('file_do')->move($destinationPath,$filename.'.'.$request->file('file_do')->getClientOriginalExtension());
			$do->file_do = $filename.'.'.$request->file('file_do')->getClientOriginalExtension();
		}

		if($request->latest_do == 1){
			$po = PurchaseOrder::find($request->po_id);
			$po->status_po = 1;
			$po->save();
		}

		$do->save();


		foreach($request->product_id as $k => $val){
			$detail  = new DetailDO();
			$detail->do_id = $do->id;
			$detail->product_id = $val;
			$detail->qty = $request->qty_arrive[$k];
			$detail->save();

			$check_stock = Stock::where(['product_id'=>$val,'dep_id'=>$po->ro->dep_id])->count();
			if($check_stock > 0){
				$stock = Stock::where(['product_id'=>$val,'dep_id'=>$po->ro->dep_id])->first();
				$update = Stock::where(['product_id'=>$val,'dep_id'=>$po->ro->dep_id])->update(['stock'=> $stock->stock + $request->qty_arrive[$k]]);
			}else{
				$stock = new Stock();
				$stock->dep_id = $po->ro->dep_id;
				$stock->product_id = $val;
				$stock->stock = $request->qty_arrive[$k];
				$stock->save();
			}
		}

		Session::flash('success','Delivery Order has been created');
		return redirect('delivery-order');
	}

	public function edit($id){
		$do = DeliveryOrder::find($id);
		$title = "Delivery Order Edit - ($do->no_do)";
		$this->data['do'] = $do;
		$this->data['title'] = $title;

		return view("content.transaksi.delivery_order.edit",$this->data);
	}

	public function update($id,DeliveryOrderRequest $request){
		$do = DeliveryOrder::find($id);
		$do->do_date = $request->do_date;
		$do->description = $request->description;
		
		if($request->change_file == 1){
			if ($request->file('file_do')->isValid()) {
				//
				$filename = md5(time().$request->file('file_do')->getClientOriginalName());
				$destinationPath = public_path('uploaded');
				$request->file('file_do')->move($destinationPath,$filename.'.'.$request->file('file_do')->getClientOriginalExtension());
				$do->file_do = $filename.'.'.$request->file('file_do')->getClientOriginalExtension();

				File::delete("uploaded/".$request->files_do_name);
			}
		}
		

		if($request->latest_do == 1){
			$po = PurchaseOrder::find($do->po_id);
			$po->status_po = 1;
			$po->save();
		}

		$do->save();


		foreach($request->detail_do as $k => $val){
			$detail  = DetailDO::find($val);
			$detail->qty = $request->qty_arrive[$k];
			$detail->save();

			$stock = Stock::where(['product_id'=>$request->product_id[$k],'dep_id'=>$po->ro->dep_id])->first();
			$update = Stock::where(['product_id'=>$request->product_id[$k],'dep_id'=>$po->ro->dep_id])->update(['stock'=> $stock->stock - $request->product_qty[$k] + $request->qty_arrive[$k]]);
			
		}

		Session::flash('success','Delivery Order has been updated');
		return redirect('delivery-order');
	}

}
