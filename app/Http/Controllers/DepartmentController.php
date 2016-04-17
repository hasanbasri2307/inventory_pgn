<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\DepartmentRequest;
use App\Department;
use Session;

class DepartmentController extends Controller
{
    //
    public function index(){
		$department = Department::all();
		$title = "Department";
		$this->data['departments'] = $department;
		$this->data['title'] = $title;

		return view("content.administrator.department.list",$this->data);
	}

	public function create(){
		$title = "Create Department";
		$this->data['title'] = $title;

		return view("content.administrator.department.create",$this->data);
	}

	public function save(DepartmentRequest $request){
		$department = new Department();
		$department->d_name = $request->d_name;
		$department->save();

		Session::flash("success","Department has beed created");
		return redirect('department');
	}

	public function edit($id,$nama){
		$department = Department::find($id);
		$title = "Department Edit - ($department->d_name)";
		$this->data['department'] = $department;
		$this->data['title'] = $title;

		return view("content.administrator.department.edit",$this->data);
	}

	public function update($id,DepartmentRequest $request){
		$department = Department::find($id);
		$department->d_name = $request->d_name;
		$department->save();

		Session::flash("success","Department has beed updated");
		return redirect('department');
	}

	public function delete($id){
		$department = Department::find($id);
		$department->delete();

		Session::flash("success","Department has beed deleted");
		return redirect('department');
	}
}
