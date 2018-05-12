@extends('layouts.main')
@section('title' , '| Edit per Menu')
@section('content')

<div class="container">
  <div class="row">
  	{!! Form::model($tblmenu, ['route' => ['menus.update', $tblmenu->menuId], 'method'=>'PUT']) !!}

    	<div class="col-md-8">
           <h4 class="page-head-line"><br>Edit Menu</h4>

            {{ Form::label('categoryId', 'Category:') }}
                <select class="form-control" name="category_id">
                    @foreach($tblmenucategory as $tblmenucategory)
                    <option value='{{ $tblmenucategory->categoryId }}' {{$tblmenu->categoryId == $tblmenucategory->categoryId ? 'selected' : ''}}>{{ $tblmenucategory->categoryName}}</option>
                    @endforeach
                </select>
        
    		
    		{{ Form::label('menuName', 'Menu: ') }}
    		{{ Form::text('menuName', null, ["class"=>'form-control input-lg']) }}

    		{{ Form::label('menuPrice', 'Price: ' ,['form-spacing-top']) }}
            {{ Form::text('menuPrice', null, ["class"=>'form-control']) }}

            {{ Form::label('menuImg', 'Update Featured Image:') }}
            {{ Form:: file('menuImg') }}

            {{ Form::label('menuDesc', 'Description: ') }}
            {{ Form::textarea('menuDesc', null, ["class"=>'form-control' , 'required' => '', 'minleght'=>'5', 'maxlenght' => '255']) }}
             
        	<hr>
    	</div>
   
<br><br><br>
    	<div class="col-md-4">
    		<div class="well">
    			<dl class="dl-horizontal">
    				<label>Create At:</label>
                    <p>{{ date('M j, Y h:ia', strtotime($tblmenu->created_at)) }}
                    </p>
    			</dl>

				<dl class="dl-horizontal">
    				<label>Last Updated:</label>
    				<p>{{ date('M j, Y h:ia', strtotime($tblmenu->updated_at)) }}
                    </p>
    			</dl>
    			
    				<hr>
				
				<div class="row">
					<div class="col-sm-6">
              {!! Html::linkRoute('menus.show', 'Cancel', array($tblmenu->menuId), array('class'=>'btn btn-danger btn-block')) !!}
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