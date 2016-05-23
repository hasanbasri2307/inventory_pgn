<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\VendorRequest;
use App\Vendor;
use Session;

class VendorController extends Controller
{
    //
    public function index(){
		$vendor = Vendor::all();
		$title = "Vendor";
		$this->data['vendors'] = $vendor;
		$this->data['title'] = $title;

		return view("content.master.vendor.list",$this->data);
	}

	public function create(){
		$title = "Create Vendor";
		$this->data['title'] = $title;

		return view("content.master.vendor.create",$this->data);
	}

	public function save(VendorRequest $request){
		$vendor = new Vendor();
		$vendor->v_name = $request->v_name;
		$vendor->phone = $request->phone;
		$vendor->fax = $request->fax;
		$vendor->address = $request->address;
		$vendor->save();

		Session::flash("success","Vendor has beed created");
		return redirect('vendor');
	}

	public function edit($id,$nama){
		$vendor = Vendor::find($id);
		$title = "Vendor Edit - ($vendor->v_name)";
		$this->data['vendor'] = $vendor;
		$this->data['title'] = $title;

		return view("content.master.vendor.edit",$this->data);
	}

	public function update($id,VendorRequest $request){
		$vendor = Vendor::find($id);
		$vendor->v_name = $request->v_name;
		$vendor->phone = $request->phone;
		$vendor->fax = $request->fax;
		$vendor->address = $request->address;
		$vendor->save();

		Session::flash("success","Vendor has beed updated");
		return redirect('vendor');
	}

	public function delete($id){
		$vendor = Vendor::find($id);
		$vendor->delete();

		Session::flash("success","Vendor has beed deleted");
		return redirect('vendor');
	}
}
