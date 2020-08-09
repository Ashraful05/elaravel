<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacture;
use App\Product;
use Image;
use DB;

class ProductController extends Controller
{
    public function addProduct(){
    	$categories=Category::where('publication_status',1)->get();
        $manufactures=Manufacture::where('publication_status',1)->get();

    	return view('admin.add-product',[
    		'categories'=>$categories,
    		'manufactures'=>$manufactures
    	]);
    }
    // public function allProduct(){
    // 	$products=Product::all();

    // 	return view('admin.all-product',['products'=>$products]);
    // }
     protected function productInfoValidate($request)
    {
                $this->validate($request,[
                    'product_name' => 'required'
        ]);
    }

    protected function productImageUpload($request)
    {
        $productImage=$request->file('product_image');
        $fileType=$productImage->getClientOriginalExtension();
        $imageName=$request->product_name.'.'.$fileType;
        $directory='product-images/';
        $imageUrl=$directory.$imageName;
        //$productImage->move($directory,$imageName);
        Image::make($productImage)->resize(200,200)->save($imageUrl);
        return $imageUrl;
    }
    protected function saveProductInfo($request,$imageUrl){
    	$product=new Product();
        $product->category_id=$request->category_id;
        $product->manufacture_id=$request->manufacture_id;
        $product->product_name=$request->product_name;
        $product->product_price=$request->product_price;
        $product->product_size=$request->product_size;
        $product->product_color=$request->product_color;
        $product->product_short_description=$request->product_short_description; 
        $product->product_long_description=$request->product_long_description; 
        $product->product_image=$imageUrl; 
        $product->publication_status=$request->publication_status; 

        $product->save(); 

    }

     public function saveProduct(Request $request){
        $this->productInfoValidate($request);
        $imageUrl = $this->productImageUpload($request);
        $this->saveProductInfo($request,$imageUrl);

        return redirect('add-product')->with('message','Product Info Saved Successfully');

	}
	public function allProduct(){
		$products=DB::table('products')->join('categories','products.category_id','=','categories.id')->join('manufactures','products.manufacture_id','=','manufactures.id')->select('products.*','categories.category_name','manufactures.manufacture_name')->get();

		return view('admin.all-product',['products'=>$products]);
	}

	public function unpublishedProductInfo($id){
		$product=Product::find($id);
		$product->publication_status=0;
		$product->save();
		return redirect('all-product')->with('message','Product Deactivated Successfully');
	}
	public function publishedProductInfo($id){
		$product=Product::find($id);
		$product->publication_status=1;
		$product->save();
		return redirect('all-product')->with('message','Product Activated Successfully');
	}

	public function editProduct($id){
		$product=Product::find($id);
		$categories=Category::where('publication_status',1)->get();
		$manufactures=Manufacture::where('publication_status',1)->get();
		return view('admin.edit-product',
			[
				'product'=>$product,
				'categories'=>$categories,
				'manufactures'=>$manufactures
			]);
	}

	 public function productBasicInfoUpdate($product,$request,$imageUrl=null){

        $product->category_id=$request->category_id;
        $product->manufacture_id=$request->manufacture_id;
        $product->product_name=$request->product_name;
        $product->product_price=$request->product_price;
        $product->product_color=$request->product_color;
        $product->product_short_description=$request->product_short_description; 
        $product->product_long_description=$request->product_long_description; 
        if($imageUrl){
        $product->product_image=$imageUrl;
    }
        //$product->product_image=$imageUrl; 
        //$product->publication_status=$request->publication_status;
        $product->save();
    }
	public function updateProduct(Request $request){
		//return $request->all();
        // $productImage=$_FILES['product_image'];
        // echo '<pre>';
        // print_r($productImage);
        $productImage=$request->file('product_image');
        $product=Product::find($request->product_id);

        if($productImage){
            unlink($product->product_image);

            $imageUrl = $this->productImageUpload($request);
            $this->productBasicInfoUpdate($product,$request,$imageUrl);

         
        // return redirect('/product/manage')->with('message','Product Info Updated');
        //return $imageUrl;

        }else{
            //$product=Product::find($request->product_id);        
        //     $product->category_id=$request->category_id;
        // $product->brand_id=$request->brand_id;
        // $product->product_name=$request->product_name;
        // $product->product_price=$request->product_price;
        // $product->product_quantity=$request->product_quantity;
        // $product->short_description=$request->short_description; 
        // $product->long_description=$request->long_description; 
        // //$product->product_image=$imageUrl; 
        // $product->publication_status=$request->publication_status; 

        // $product->save();  
            $this->productBasicInfoUpdate($product,$request);

       
        }
         //return redirect('/product/manage')->with('message','Product Info Updated');

        //echo $productImage;

		return redirect('all-product')->with('message','Product Info Updated Successfully');

	}

	public function deleteProduct($id){
		$product=Product::find($id);
		$product->delete();
		return redirect('all-product')->with('message','Product Deleted Successfully');
	}


}
