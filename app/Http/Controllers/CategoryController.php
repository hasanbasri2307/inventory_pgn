<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CategoryRequest;
use Session;
use App\Category;
use App\Department;
use App\Subcategory;

class CategoryController extends Controller
{
    //
    public function index(){
		$category = Category::all();
		$title = "Category";
		$this->data['categories'] = $category;
		$this->data['title'] = $title;

		return view("content.administrator.category.list",$this->data);
	}

	public function create(){
		$title = "Create Category";
		$this->data['title'] = $title;

		return view("content.administrator.category.create",$this->data);
	}

	public function save(CategoryRequest $request){
		$category = new Category();
		$category->cat_name = $request->cat_name;
		
		$category->save();

		foreach($request->sub_cat as $item){
			$subcategory = new Subcategory();
			$subcategory->sub_cat_name = $item;
			$subcategory->cat_id = $category->id;
			$subcategory->save();
		}

		Session::flash("success","Category has beed created");
		return redirect('category');
	}

	public function edit($id,$nama){
		$category = Category::find($id);
		$subcategory = Subcategory::where(["cat_id" => $id])->get();
		$title = "Category Edit - ($category->cat_name)";
		$this->data['category'] = $category;
		$this->data['title'] = $title;
		$this->data['subcategory'] = $subcategory;

		return view("content.administrator.category.edit",$this->data);
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
}
