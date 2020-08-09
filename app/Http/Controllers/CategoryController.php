<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
	public function index(){
		return view('admin.add-category');
	}
	
	public function saveCategory(Request $request){
		$category=new Category();
		$category->category_name=$request->category_name;
		$category->category_description=$request->category_description;
		$category->publication_status=$request->publication_status;
		$category->save();

		return redirect('add-category')->with('message','Category Info Saved Successfully');
	}
	public function allCategory(){
		$categories=Category::all();
		return view('admin.all-category',['categories'=>$categories]);
	}
	public function unpublishedCategoryInfo($id){
		$category=Category::find($id);
		$category->publication_status=0;
		$category->save();
		return redirect('all-category')->with('message','Category Deactivated Successfully');
	}
	public function publishedCategoryInfo($id){
		$category=Category::find($id);
		$category->publication_status=1;
		$category->save();
		return redirect('all-category')->with('message','Category activated successfully');
	}
	
	public function editCategory($id){
		$category=Category::find($id);

		 return view('admin.edit-category',['category'=>$category]);
	}
	public function updateCategory(Request $request){
		$category=Category::find($request->category_id);
		$category->category_name=$request->category_name;
		$category->category_description=$request->category_description;
		$category->publication_status=$request->publication_status;

		$category->save();
		return redirect('all-category')->with('message','Category Info Updated Successfully');

	}
	public function deleteCategory($id){
		$category=Category::find($id);
		$category->delete();

		return redirect('all-category')->with('message','Category Info Deleted Successfully');
	}
}