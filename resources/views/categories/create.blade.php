@extends('layouts.main')
@section('title' . '| Create')
@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
@endsection
@section('content')

<div class="container">
 <div class="row">
   <div class="col-md-8 col-md-offset-2">
       <h4 class="page-head-line"><br>Create New Category</h4>

       {!! Form::open(array('route'=>'categories.store', 'data-parsley-validate'=>'' , 'files' => true)) !!}

       		
			{{ Form::label('categoryName','Category Name:') }}
			{{ Form::text('categoryName', null, array('class'=>'form-control', 'maxlength'=>'30')) }}

			{{ Form::label('categoryImg' , 'Upload Feature Image:')}}
			{{ Form::file('categoryImg') }}
		
			{{ Form::label('categoryDesc','Category Description:') }}
			{{ Form::textarea('categoryDesc', null, array('class'=>'form-control','maxlength'=>'255')) }}


			{{ Form::submit('Create Category', array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top:20px')) }}
			<br>

       {!! Form::close() !!}
   </div>
 </div>
</div>		



@endsection  

@section('stylesheets')
	{!! Html::style('js/parsley.min.js') !!}
@endsection