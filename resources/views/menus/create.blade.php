@extends('layouts.main')
@section('title' . '| Create')
@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
@endsection
@section('content')

<div class="container">
 <div class="row">
   <div class="col-md-8 col-md-offset-2">
       <h4 class="page-head-line"><br>Create New Menu</h4>

       {!! Form::open(array('route'=>'menus.store', 'data-parsley-validate'=>'' , 'files' => true)) !!}

       		{{ Form::label('categoryId', 'Category:') }}
				<select class="form-control" name="category_id">
					@foreach($tblmenucategory as $tblmenucategory)
					<option value='{{ $tblmenucategory->categoryId }}'>{{ $tblmenucategory->categoryName}}</option>
					@endforeach
				</select>
		
			{{ Form::label('menuName','Menu Name:') }}
			{{ Form::text('menuName', null, array('class'=>'form-control', 'maxlength'=>'30')) }}
			
			{{ Form::label('menuPrice','Menu Price:') }}
			{{ Form::text('menuPrice', null, array('class'=>'form-control')) }}

			{{ Form::label('menuImg' , 'Upload Feature Image:')}}
				{{ Form::file('menuImg') }}
		
			{{ Form::label('menuDesc','Menu Description:') }}
			{{ Form::textarea('menuDesc', null, array('class'=>'form-control','maxlength'=>'255')) }}

			{{ Form::submit('Create Menu', array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top:20px')) }}
			<br>

       {!! Form::close() !!}
   </div>
 </div>
</div>		



@endsection  

@section('stylesheets')
	{!! Html::style('js/parsley.min.js') !!}
@endsection