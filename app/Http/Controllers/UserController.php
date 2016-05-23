<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;
use Session;
use App\User;
use App\Department;

class UserController extends Controller
{
    //
	public function index(){
		$user = User::all();
		$title = "User";
		$this->data['users'] = $user;
		$this->data['title'] = $title;

		return view("content.master.user.list",$this->data);
	}

	public function create(){
		$title = "Create User";
		$this->data['department'] = $this->get_department();
		$this->data['title'] = $title;

		return view("content.master.user.create",$this->data);
	}

	public function save(UserRequest $request){
		$user = new User();
		$user->name = $request->name;
		$user->role = $request->role;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);
		$user->dep_id = $request->dep_id;
		$user->status_user = $request->status_user;
		$user->save();

		Session::flash("success","User has beed created");
		return redirect('user');
	}

	public function edit($id,$nama){
		$user = User::find($id);
		$title = "User Edit - ($user->name)";
		$this->data['user'] = $user;
		$this->data['title'] = $title;
		$this->data['department'] = $this->get_department();

		return view("content.master.user.edit",$this->data);
	}

	public function update($id,UserRequest $request){
		$user = User::find($id);
		$user->name = $request->name;
		$user->role = $request->role;
		$user->dep_id = $request->dep_id;
		$user->status_user = $request->status_user;
		$user->save();

		Session::flash("success","User has beed updated");
		return redirect('user');
	}

	public function delete($id){
		$user = User::find($id);
		$user->delete();

		Session::flash("success","User has beed deleted");
		return redirect('user');
	}

	private function get_department(){
		$departments = Department::all();
		$results = [];
		foreach($departments as $department){
			$results[$department->id] = $department->d_name;
		}

		return $results;
	}
}
