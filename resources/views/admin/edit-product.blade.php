@extends('admin-layout')
@section('admin-content')
<ul class="breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="index.html">Home</a>
    <i class="icon-angle-right"></i> 
  </li>
  <li>
    <i class="icon-edit"></i>
    <a href="#">Edit Product</a>
  </li>
</ul>

<div class="row-fluid sortable">
  <div class="box span12">
    <div class="box-header" data-original-title>
      <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Product</h2>
      <div class="box-icon">
        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
      </div>
    </div>

    <div class="box-content">
      <p> <h3 class="text-center text-success">{{Session::get('message')}}</h3></p>
      <form class="form-horizontal" action="{{ url('update-product') }}" method="post">
        @csrf
        <fieldset>
          <div class="control-group">
            <label class="control-label" for="date01">Category Name</label>
            <div class="controls">
              <select id="selectError3"  name="category_id">
                <option>-----Select Category Name----</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
              </select>

            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="date01">Manufacture Name</label>
            <div class="controls">
              <select id="selectError3"  name="manufacture_id">
                <option>-----Select Manufacture Name----</option>
                @foreach ($manufactures as $manufacture)
                <option value="{{ $manufacture->id }}">{{ $manufacture->manufacture_name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="date01">Product Name</label>
            <div class="controls">
             <input type="text" value="{{$product->product_name}}" name="product_name">
             <input type="hidden" value="{{$product->id}}" name="product_id">
           </div>
         </div>


         <div class="control-group hidden-phone">
          <label class="control-label" for="textarea2">Product Price </label>
          <div class="controls">
           <input type="number" name="product_price" value="{{ $product->product_price }}">
         </div>
       </div> 

       <div class="control-group hidden-phone">
        <label class="control-label" for="textarea2">Product Short Descritpion </label>
        <div class="controls">
         <input type="text" name="product_short_description" value="{{ $product->product_short_description }}">
       </div>
     </div> 

     <div class="control-group hidden-phone">
      <label class="control-label" for="textarea2">Product Long Descritpion </label>
      <div class="controls">
       <input type="text" name="product_long_description" value="{{ $product->product_long_description }}">
     </div>
   </div>

   <div class="control-group hidden-phone">
    <label class="control-label" for="textarea2">Product Image </label>
    <div class="controls">
     <input type="file" name="product_image" accept="image/*" /><br>
     <img src="{{ asset($product->product_image) }}" height="80" width="80" alt="">
   </div>
 </div>

 <div class="control-group hidden-phone">
  <label class="control-label" for="textarea2">Product Color </label>
  <div class="controls">
   <input type="text" name="product_color" value="{{ $product->product_color }}" />

 </div>
</div>



<div class="form-actions">
  <button type="submit" class="btn btn-primary">Update Product</button>

</div>
</fieldset>
</form>   

</div>
</div><!--/span-->

</div>
@endsection