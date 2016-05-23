<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use App\RequestOrder;
use App\DeliveryOrder;
use App\PurchaseOrder;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Auth::user()->role;
        $view = "content.".$role."_home";
        $this->data['title'] = "Home";
        
        if(Auth::user()->role == "staff" and Auth::user()->dep_id != 7 and Auth::user()->dep_id != 8){
            $request_order = RequestOrder::where(['dep_id'=>Auth::user()->dep_id])->limit(3)->get();
            $ro_1 = RequestOrder::where(['status_ro' => 0,'dep_id'=>0])->count();
            $ro_2 = RequestOrder::where(['status_ro' =>1,'dep_id'=>1])->count();
            $ro_3 = RequestOrder::where(['status_ro' =>1,'dep_id'=>2])->count();

            $this->data['ro_1'] = $ro_1;
            $this->data['ro_2'] = $ro_2;
            $this->data['ro_3'] = $ro_3;

            $this->data['request_order'] = $request_order;
        }elseif(Auth::user()->role == "staff" and Auth::user()->dep_id == 7){
            $po_0 = PurchaseOrder::where(['status_po' => 0])->count();
            $po_1 = PurchaseOrder::where(['status_po' =>1])->count();
            $this->data['po_0'] = $po_0;
            $this->data['po_1'] = $po_1;
        }elseif(Auth::user()->role == "staff" and Auth::user()->dep_id == 8){
            $ro_waiting = RequestOrder::where('status_ro','=',0)->count();
            $ro_to_po =  RequestOrder::has('po','=',0)->where('status_ro','=','1')->count();
            $po_process = PurchaseOrder::where('status_po','=','0')->count();
            $po_done = PurchaseOrder::where('status_po','=',1)->count();

            $this->data['ro_waiting'] = $ro_waiting;
            $this->data['ro_to_po']= $ro_to_po;
            $this->data['po_process'] = $po_process;
            $this->data['po_done'] = $po_done;
        }
        

        return view($view,$this->data);
    }
}
