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
		<a href="#">Add Product</a>
	</li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<p><h3 class="text-center text-success">{{ Session::get('message') }}</h3></p>
		<div class="box-content">

			<form class="form-horizontal" action="{{ url('save-product') }}" method="post" enctype="multipart/form-data">
				@csrf
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="date01">Product Name</label>
						<div class="controls">
							<input type="text" name="product_name" required="">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="selectError3">Product Category</label>
						<div class="controls">
							<select id="selectError3" name="category_id">
								<option>---Select Category---</option>
								
								@foreach($categories as $category)
								<option value="{{ $category->id }}">{{ $category->category_name }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="selectError3">Manufacture Name</label>
						<div class="controls">
							<select id="selectError3" name="manufacture_id">

								<option value="">---Select Manufacture--</option>
								@foreach($manufactures as $manufacture)
								
								<option value="{{ $manufacture->id }}">{{ $manufacture->manufacture_name }}</option>
								@endforeach
								
							</select>
						</div>
					</div>

					
					<div class="control-group hidden-phone">
						<label class="control-label" for="textarea2">Product Short Description </label>
						<div class="controls">
							<textarea class="cleditor" name="product_short_description" required=""></textarea>
						</div>
					</div>

					<div class="control-group hidden-phone">
						<label class="control-label" for="textarea2">Product Long Description </label>
						<div class="controls">
							<textarea class="cleditor" name="product_long_description" required=""></textarea>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="date01">Product Price</label>
						<div class="controls">
							<input type="text" name="product_price" required="">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="fileInput">Product Image</label>
						<div class="controls">
							<input class="input-file uniform_on" id="fileInput" type="file" name="product_image" accept="image/*">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="date01">Product Size</label>
						<div class="controls">
							<input type="text" name="product_size" >
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="date01">Product Color</label>
						<div class="controls">
							<input type="text" name="product_color" required="">
						</div>
					</div>
					
					<div class="control-group hidden-phone">
						<label class="control-label" for="textarea2">Pubication Status </label>
						<div class="controls">
							{{-- <input type="checkbox" name="publication_status" value="1"> --}}
							<label>
								<input type="radio" name="publication_status"  value="1" />Published</label> 
								<label>
									<input type="radio" name="publication_status" value="0" />Unpublished</label>
								</div>
							</div>

							<div class="form-actions">
								<button type="submit" class="btn btn-primary">Add Product</button>
								<button type="reset" class="btn">Cancel</button>
							</div>
						</fieldset>
					</form>   

				</div>
			</div><!--/span-->

		</div>
		@endsection