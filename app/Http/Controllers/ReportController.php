<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\DeliveryOrder;
use App\RequestOrder;
use App\PurchaseOrder;
use App\Department;
use App\Product;
use App\Vendor;

class ReportController extends Controller
{
    //
    public function stock(){
    	$department = Department::all();
    	$product = Product::all();
    	$this->data['department'] = array_pluck($department,"d_name","id");
    	$this->data['product'] = array_pluck($product,"p_name","id");
        $this->data['title'] = "Stock Report";
        return view("content.laporan.stock",$this->data);
    }

    public function doStock(Request $request){
    	$where = [];

    	if(!empty($request->department_id)){
    		$where['dep_id'] = $request->department_id;
    	}

    	if(!empty($request->product_id)){
    		$where['product_id'] = $request->product_id;
    	}

    	if(!empty($request->order_by)){
    		$stock = Stock::where($where)->orderBy('stock',$request->order_by)->get();
    	}else{
			$stock = Stock::where($where)->orderBy('stock','asc')->get();
    	}

    	$this->data['stock'] = $stock;
    	$this->data['title']= "Stock Report Results";

    	return view("content.laporan.stock_result",$this->data);
    }

    public function requestOrder(){
    	$department = Department::all();
    	$this->data['department'] = array_pluck($department,"d_name","id");
        $this->data['title'] = "Request Order Report";
    	return view("content.laporan.request_order",$this->data);
    }

    public function doRequestOrder(Request $request){
    	$where = [];

    	if(!empty($request->department_id)){
    		$where['dep_id'] = $request->department_id;
    	}

    	if($request->status_ro != ""){
    		$where['status_ro'] = $request->status_ro;
    	}

    	if(!empty($request->start) && !empty($request->end)){
    		$ro = RequestOrder::where($where)->whereBetween('date_ro',[date("Y-m-d H:i:s",strtotime($request->start)),date("Y-m-d H:i:s",strtotime($request->end))])->orderBy('date_ro',$request->order_by)->get();
    	}else{
    		$ro = RequestOrder::where($where)->orderBy('date_ro',$request->order_by)->get();
    	}

    	$this->data['title'] = "Request Order Report";
    	$this->data['ro'] = $ro;
    	return view("content.laporan.request_order_result",$this->data);
    }

    public function purchaseOrder(){
    	$department = Department::all();
    	$vendor = Vendor::all();
    	$this->data['department'] = array_pluck($department,"d_name","id");
    	$this->data['vendor'] = array_pluck($vendor,"v_name","id");
        $this->data['title'] = "Purchase Order Report";
    	return view("content.laporan.purchase_order",$this->data);
    }

    public function doPurchaseOrder(Request $request){
    	$where = [];

    	if(!empty($request->vendor_id)){
    		$where['vendor_id'] = $request->vendor_id;
    	}

    	if($request->status_po != ""){
    		$where['status_po'] = $request->status_po;
    	}

    	if(!empty($request->start) && !empty($request->end)){
    		if(!empty($request->department_id)){
    			$po = PurchaseOrder::whereHas('ro',function($q) use($request){
    				$q->where('dep_id','=',$request->department_id);
    			})->where($where)->whereBetween('po_date',[date("Y-m-d H:i:s",strtotime($request->start)),date("Y-m-d H:i:s",strtotime($request->end))])->orderBy('po_date',$request->order_by)->get();
    		}else{
    			$po = PurchaseOrder::where($where)->whereBetween('po_date',[date("Y-m-d H:i:s",strtotime($request->start)),date("Y-m-d H:i:s",strtotime($request->end))])->orderBy('po_date',$request->order_by)->get();
    		}
    		
    	}else{
    		if(!empty($request->department_id)){
				$po = PurchaseOrder::where($where)->whereHas('ro',function($q) use($request){ $q->where('dep_id','=',$request->department_id);
				})->orderBy('po_date',$request->order_by)->get();
				
			}else{
				$po = PurchaseOrder::where($where)->orderBy('po_date',$request->order_by)->get();
			}

    	}

    	$this->data['title'] = "Purchase Order Report";
    	$this->data['po'] = $po;
    	return view("content.laporan.purchase_order_result",$this->data);

    }

    public function deliveryOrder(){
    	$department = Department::all();
    	$vendor = Vendor::all();
    	$this->data['department'] = array_pluck($department,"d_name","id");
    	$this->data['vendor'] = array_pluck($vendor,"v_name","id");
        $this->data['title'] = "Delivery Order Report";
    	return view("content.laporan.delivery_order",$this->data);
    }

    public function doDeliveryOrder(Request $request){
    	$where = [];

    	if(!empty($request->vendor_id)){
    		$where['vendor_id'] = $request->vendor_id;
    	}

    	if($request->status_po != ""){
    		$where['status_po'] = $request->status_po;
    	}

    	if(!empty($request->start) && !empty($request->end)){
    		
			$do = DeliveryOrder::whereHas('po',function($q) use($request,$where){
				$q->where($where);
			})->whereBetween('do_date',[date("Y-m-d H:i:s",strtotime($request->start)),date("Y-m-d H:i:s",strtotime($request->end))])->orderBy('do_date',$request->order_by)->get();
    		
    	}else{
    		
			$do = DeliveryOrder::whereHas('po',function($q) use($request,$where){ $q->where($where);
			})->orderBy('do_date',$request->order_by)->get();

    	}

    	$this->data['title'] = "Delivery Order Report";
    	$this->data['do'] = $do;
    	return view("content.laporan.delivery_order_result",$this->data);
    }
}
