<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PurchaseOrderRequest;
use App\PurchaseOrder;
use App\RequestOrder;
use App\DetailPO;
use App\DetailRO;
use App\Vendor;
use Nomor;
use Auth;
use Session;

class PurchaseOrderController extends Controller
{
    //

    public function index(){
    	$po = PurchaseOrder::with(['detail_po'])->get();
		$title = "Purchase Order";
		$this->data['po'] = $po;
		$this->data['title'] = $title;

		return view("content.transaksi.purchase_order.list",$this->data);
    }

    public function create(){
		$title = "Create Purchase Order";
		$vendor = Vendor::all();
		$ro = RequestOrder::has('po','=',0)->where('status_ro','=','1')->get();
		$this->data['ro'] = array_pluck($ro,"no_ro","id");
		$this->data['vendor'] = array_pluck($vendor,"v_name","id");
		$this->data['ro_detail'] = $ro;
		$this->data['title'] = $title;

		return view("content.transaksi.purchase_order.create",$this->data);
	}

	public function save(PurchaseOrderRequest $request){
		$po = new PurchaseOrder();
		$po->no_po  = Nomor::getNomor("purchase_order","no_po","PO");
		$po->ro_id = $request->ro_id;
		$po->po_date = $request->po_date;
		$po->vendor_id = $request->vendor_id;
		$po->created_by = Auth::user()->id;
		$po->status_po = 0;

		$po->save();


		foreach($request->product_id as $key => $item){
			$detail_po = new DetailPO();
			$detail_po->po_id = $po->id;
			$detail_po->product_id = $item;
			$detail_po->qty = $request->qty_approve[$key];
			$detail_po->save();

			$detail_ro = DetailRO::find($request->detail_ro_id[$key]);
			$detail_ro->qty_approve = $request->qty_approve[$key];
			$detail_ro->save();
		}

		Session::flash("success","Purcase order has beed created");
		return redirect('purchase-order');
	}

	public function edit($id){
		$po = PurchaseOrder::find($id);
		$vendor = Vendor::all();
		$title = "Purchase Order Edit - ($po->no_po)";
		$this->data['vendor'] = array_pluck($vendor,"v_name","id");
		$this->data['po'] = $po;
		$this->data['title'] = $title;

		return view("content.transaksi.purchase_order.edit",$this->data);
	}

	public function update($id,PurchaseOrderRequest $request){
		$po = PurchaseOrder::find($id);
		$po->po_date = $request->po_date;
		$po->vendor_id = $request->vendor_id;
		$po->save();


		Session::flash("success","Purcase order has beed updated");
		return redirect('purchase-order');
	}

	public function detail($id){
		$po = PurchaseOrder::with(['detail_po'])->find($id);
		$view = view("content.transaksi.purchase_order.detail",['po'=>$po])->render();
		return response()->json(['view'=>$view,'status'=>true]);
	}

	public function show($id){
		$po = PurchaseOrder::find($id);
		$this->data['title'] = "Invoice - $po->no_po";
		$this->data['po'] =$po;
		return view("content.transaksi.purchase_order.invoice",$this->data);
	}


    
}
