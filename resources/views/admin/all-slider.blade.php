@extends('admin-layout')

@section('admin-content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="#">Tables</a></li>
</ul>

<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<p><h3 class="text-center text-success">{{ Session::get('message') }}</h3></p>
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
					<tr>
						<th>SL No.</th>
						<th>Slider Image</th>
                        <th>publication Status</th>
                        <th>Actions</th>
					</tr>

				</thead>   
				
				<tbody>
					@php($i=1)
					@foreach ($sliders as $slider)
					<tr>
						<td>{{ $i++ }}</td>
						
						<td>
							<img src="{{ asset($slider->slider_image) }}" height="100" width="100">
						</td>
						
						<td class="center">
							@if($slider->publication_status==1)
							<span class="label label-success">Active</span>
							@else
								<span class="label label-danger">InActive</span>
							@endif
						</td>
						<td>
							@if($slider->publication_status==1)
							<a href="{{ url('inactive-slider/'.$slider->id) }}" class="btn btn-danger">
                				<i class="halflings-icon white thumbs-down"></i>  
                			</a>
                			@else
                			<a href="{{ url('active-slider/'.$slider->id) }}" class="btn btn-success">
                				<i class="halflings-icon white thumbs-up"></i>  
                			</a>
                			@endif

							
                			<a href="{{url('delete-slider',['id'=>$slider->id])}}" class="btn btn-danger">
                				<span class="halflings-icon white trash"></span>
                			</a>
						</td>

					</tr>
					@endforeach

				</tbody>
			</table>    

		</div> 

	</div>
	@endsection