<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ProductRequest;
use App\Product;
use Session;
use App\Category;

class ProductController extends Controller
{
    //
    public function index(){
		$product = Product::all();
		$title = "Product";
		$this->data['products'] = $product;
		$this->data['title'] = $title;

		return view("content.master.product.list",$this->data);
	}

	public function create(){
		$title = "Create Product";
		$this->data['category'] = $this->get_category();
		$this->data['title'] = $title;

		return view("content.msater.product.create",$this->data);
	}

	public function save(ProductRequest $request){
		$product = new Product();
		$product->p_name = $request->p_name;
		$product->price = $request->price;
		$product->description = $request->description;
		$product->sub_cat_id = $request->sub_cat_id;
		$product->save();

		Session::flash("success","Product has beed created");
		return redirect('product');
	}

	public function edit($id,$nama){
		$product = Product::find($id);
		$title = "Product Edit - ($product->name)";
		$this->data['product'] = $product;
		$this->data['title'] = $title;
		$this->data['category'] = $this->get_category();

		return view("content.master.product.edit",$this->data);
	}

	public function update($id,ProductRequest $request){
		$product = Product::find($id);
		$product->p_name = $request->p_name;
		$product->price = $request->price;
		$product->description = $request->description;
		$product->sub_cat_id = $request->sub_cat_id;
		$product->save();

		Session::flash("success","Product has beed updated");
		return redirect('product');
	}

	public function delete($id){
		$product = Product::find($id);
		$product->delete();

		Session::flash("success","Product has beed deleted");
		return redirect('product');
	}

	private function get_category(){
		$categories = Category::all();
		$results = [];
		foreach($categories as $category){
			$sub = [];
			foreach($category->sub_category as $item){
				$sub[$item->id] = $item->sub_cat_name;
			}

			$results[$category->cat_name] = $sub;
		}

		return $results;
	}
}
