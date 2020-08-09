<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;
use App\Manufacture;
use App\Product;

class FrontController extends Controller
{
    public function index(){
    	$publishedproducts=DB::table('products')->join('categories','products.category_id','=','categories.id')->join('manufactures','products.manufacture_id','=','manufactures.id')->select('products.*','categories.category_name','manufactures.manufacture_name')->where('products.publication_status',1)->get();

        // return view('pages.home-content',['publishedproducts'=>$publishedproducts]);
    	return view('pages.home-content',['publishedproducts'=>$publishedproducts]);
    }
    public function showProductByCategory($id){
    	$productcategories=DB::table('products')->join('categories','products.category_id','=','categories.id')->select('products.*','categories.category_name')->where('categories.id',$id)->
    	where('products.publication_status',1)->get();

    	return view('pages.category-by-products',['productcategories'=>$productcategories]);
    }

    public function showProductByManufacture($id){
    	$productmanufactures=DB::table('products')->join('categories','products.category_id','=','categories.id')->join('manufactures','products.manufacture_id','=','manufactures.id')->select('products.*','categories.category_name','manufactures.manufacture_name')->where('manufactures.id',$id)->where('products.publication_status',1)->get();
    	return view('pages.manufactures-by-products',['productmanufactures'=>$productmanufactures]);
    }
    public function productDetails(){
        $productdetails=DB::table('products')->join('categories','products.category_id','=','categories.id')->join('manufactures','products.manufacture_id','=','manufactures.id')->select('products.*','categories.category_name','manufactures.manufacture_name')->where('products.publication_status',1)->get();
    	return view('pages.product-details',['productdetails'=>$productdetails]);
    }
}
