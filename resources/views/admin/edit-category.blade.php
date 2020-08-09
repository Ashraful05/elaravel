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
					<a href="#">Add Category</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Category</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					
					<div class="box-content">
						<p> <h3 class="text-center text-success">{{Session::get('message')}}</h3></p>
						<form class="form-horizontal" action="{{ url('update-category') }}" method="post">
							@csrf
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="date01">Category Name</label>
							  <div class="controls">
								<input type="text" name="category_name" value="{{ $category->category_name }}">
								<input type="hidden" name="category_id" value="{{ $category->id }}">
							  </div>
							</div>

							          
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Categroy Description </label>
							  <div class="controls">
								<textarea class="cleditor" name="category_description" required="">{{ $category->category_description }}</textarea>
							  </div>
							</div>

							

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update Category</button>
							  
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div>
@endsection