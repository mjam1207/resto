@extends('layouts.main')
@section('title' , '| View per Menu')
@section('content')

<div class="container">
  <div class="row">
    	<div class="col-md-8">
            <h4 class="page-head-line"><br>View Categories</h4>
        
            <img src="{{ asset('images/' . $tblmenucategory->categoryImg)}} " alt= "This is a photo" height="300" width="500"/>

          	<h1>{{ $tblmenucategory->categoryName }}</h1>
          	<p>{{ $tblmenucategory->categoryDesc }}</p>
          	<hr>
    	</div>

    <br><br><br>
    	<div class="col-md-4">
    		<div class="well">
        			<dl class="dl-horizontal">
        				  <label>Create At:</label>
                  <p>{{ date('M j, Y h:ia', strtotime($tblmenucategory->created_at)) }}</p>
        			</dl>
      				<dl class="dl-horizontal">
          				<label>Last Updated:</label>
          				<p>{{ date('M j, Y h:ia', strtotime($tblmenucategory->updated_at)) }}</p>
          		</dl>
        			
    				
    				<div class="row">
      					<div class="col-sm-6">
                    {!! Html::linkRoute('categories.edit', 'Edit', array($tblmenucategory->categoryId), array('class'=>'btn btn-primary btn-block')) !!}
      					</div>
      					<div class="col-sm-6">
                   {!! Form::open(['route'=>['categories.destroy', $tblmenucategory->categoryId], 'method'=>'DELETE']) !!}
      					   {!! Form::submit('Delete',['class'=>'btn btn-danger btn-block'])!!}
                   {!! Form::close() !!}
      					</div>

                <div class="row">
              <div class="col-md-12">
              
                {{Html::linkRoute('categories.index','<<See List of Foods', [], ['class'=>'btn btn-default btn-block btn-h1-spacing'])}}
              </div>
            </div>

    				</div>
    		</div>
    	</div>
</div>
</div>

@endsection