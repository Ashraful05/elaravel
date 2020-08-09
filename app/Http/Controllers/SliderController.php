<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;
use App\Manufacture;
use App\Slider;

use Image;
use DB;

class SliderController extends Controller
{
    public function addSlider(){
    	return view('admin.add-slider');
    }
    public function allSlider(){
    	$sliders=Slider::all();
    	return view('admin.all-slider',['sliders'=>$sliders]);
    }
    protected function sliderInfoValidate($request)
    {
                $this->validate($request,[
                    'slider_image' => 'required'
        ]);
    }

    protected function sliderImageUpload($request)
    {
    	$sliderName=Str::random(20);
        $sliderImage=$request->file('slider_image');
        $fileType=$sliderImage->getClientOriginalExtension();
        $imageName=$request->sliderName.'.'.$fileType;
        $directory='slider-images/';
        $imageUrl=$directory.$imageName;
        //$sliderImage->move($directory,$imageName);
        Image::make($sliderImage)->resize(200,200)->save($imageUrl);
        return $imageUrl;
    }
    protected function saveSliderInfo($request,$imageUrl){
    	$slider=new Slider();
        
        $slider->slider_image=$imageUrl; 
        $slider->publication_status=$request->publication_status; 

        $slider->save(); 

    }

     public function saveSlider(Request $request){
        $this->sliderInfoValidate($request);
        $imageUrl = $this->sliderImageUpload($request);
        $this->saveSliderInfo($request,$imageUrl);

        return redirect('add-slider')->with('message','Slider Info Saved Successfully');

	}
	public function unpublishedsliderInfo($id){
		$slider=Slider::find($id);
		$slider->publication_status=0;
		$slider->save();
		return redirect('all-slider')->with('message','Slider Deactivated Successfully');
	}

	public function publishedsliderInfo($id){
		$slider=Slider::find($id);
		$slider->publication_status=1;
		$slider->save();
		return redirect('all-slider')->with('message','slider Activated Successfully');
	}
	

	public function deleteSlider($id){
		$slider=Slider::find($id);
		$slider->delete();
		return redirect('all-slider')->with('message','Slider Deleted Successfully');
	}
    

}
