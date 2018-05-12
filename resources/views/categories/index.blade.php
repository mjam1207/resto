@extends('layouts.main')
@section('title','| Categories')
@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		  <h4 class="page-head-line"><br>Categories</h4>
		</div>

		<div class="col-md-4 col-md-offset-2">
        	<a href="{{ route('categories.create')}}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Category</a>
      	</div>

		<div class="col-md-10 col-md-offset-1">
   			<div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Image</th>
						<th>Description</th>
						<th>Created At</th>
						<th>View/Edit</th>
					</tr>
				</thead>

				<tbody>
				@foreach ($tblmenucategory as $tblmenucategory)
					<tr>
						<th>{{ $tblmenucategory->categoryId}}</th>
						<td>{{ $tblmenucategory->categoryName}}</td>
						<td><img src="{{ asset('images/'.$tblmenucategory->categoryImg)}} " alt= "This is a photo" /></td>
						<td>{{ $tblmenucategory->categoryDesc}}</td>
						<td>{{ date('M j, Y', strtotime($tblmenucategory->created_at))}}</td>
                		<td><a href="{{ route('categories.show',$tblmenucategory->categoryId)}}" class="btn btn-default btn-sm"><i class="fa fa-folder-open"></i>View</a>
               			<a href="{{ route('categories.edit',$tblmenucategory->categoryId)}}" class="btn btn-default btn-sm"><i class="fa fa-fw fa-edit"></i>Edit</a></td>
              		</tr>
				@endforeach
				</tbody>
			</table>
		</div> <!--end of .col-md-8-->

		</div>
	</div>

@endsection