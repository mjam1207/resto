@extends('layouts.main')
@section('title' , '| Edit per Categories')
@section('content')

<div class="container">
  <div class="row">
  	{!! Form::model($tblmenucategory, ['route' => ['categories.update', $tblmenucategory->categoryId], 'method'=>'PUT' , 'files' => true]) !!}

    	<div class="col-md-8">
           <h4 class="page-head-line"><br>Edit Category</h4>
    		
    		{{ Form::label('categoryName', 'Category: ') }}
    		{{ Form::text('categoryName', null, ["class"=>'form-control input-lg']) }}

            {{ Form::label('categoryImg', 'Update Featured Image:') }}
            {{ Form:: file('categoryImg') }}

            {{ Form::label('categoryDesc', 'Description: ') }}
            {{ Form::textarea('categoryDesc', null, ["class"=>'form-control' , 'required' => '', 'minleght'=>'5', 'maxlenght' => '255']) }}
        	<hr>
    	</div>
   
<br><br><br>
    	<div class="col-md-4">
    		<div class="well">
    			<dl class="dl-horizontal">
    				<label>Create At:</label>
                    <p>{{ date('M j, Y h:ia', strtotime($tblmenucategory->created_at)) }}
                    </p>
    			</dl>

				<dl class="dl-horizontal">
    				<label>Last Updated:</label>
    				<p>{{ date('M j, Y h:ia', strtotime($tblmenucategory->updated_at)) }}
                    </p>
    			</dl>
    			
    				<hr>
				
				<div class="row">
					<div class="col-sm-6">
              {!! Html::linkRoute('categories.show', 'Cancel', array($tblmenucategory->categoryId), array('class'=>'btn btn-danger btn-block')) !!}
					</div>
					<div class="col-sm-6">
				    	{{ Form::submit('Save', ['class'=>'btn btn-success btn-block']) }}				
					</div>
				</div>
    		</div>
             {!! Form::close() !!}
    	</div>

 </div>
</div><!--end of form-->

@endsection