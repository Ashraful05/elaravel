<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacture;

class ManufactureController extends Controller
{
    public function addManufacture(){
    	return view('admin.add-manufacture');
    }
    public function saveManufacture(Request $request){
    	$manufacture=new Manufacture();
		$manufacture->manufacture_name=$request->manufacture_name;
		$manufacture->manufacture_description=$request->manufacture_description;
		$manufacture->publication_status=$request->publication_status;
		$manufacture->save();

		return redirect('add-manufacture')->with('message','Manufacture Info Saved Successfully');
    }
    public function allManufacture(){
    	$manufactures=Manufacture::all();
    	return view('admin.all-manufacture',['manufactures'=>$manufactures]);
    }
    public function unpublishedManufactureInfo($id){
		$manufacture=Manufacture::find($id);
		$manufacture->publication_status=0;
		$manufacture->save();
		return redirect('all-manufacture')->with('message','Manufacture Deactivated Successfully');
	}
	public function publishedManufactureInfo($id){
		$manufacture=Manufacture::find($id);
		$manufacture->publication_status=1;
		$manufacture->save();
		return redirect('all-manufacture')->with('message','Manufacture activated successfully');
	}
	
	public function editManufacture($id){
		$manufacture=Manufacture::find($id);

		 return view('admin.edit-manufacture',['manufacture'=>$manufacture]);
	}
	public function updateManufacture(Request $request){
		$manufacture=Manufacture::find($request->manufacture_id);
		$manufacture->manufacture_name=$request->manufacture_name;
		$manufacture->manufacture_description=$request->manufacture_description;
		$manufacture->publication_status=$request->publication_status;

		$manufacture->save();
		return redirect('all-manufacture')->with('message','Manufacture Info Updated Successfully');

	}
	public function deleteManufacture($id){
		$manufacture=Manufacture::find($id);
		$manufacture->delete();

		return redirect('all-manufacture')->with('message','Manufacture Info Deleted Successfully');
	}

}
