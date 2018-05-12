@extends('layouts.main')
@section('title' , '| View per Menu')
@section('content')

<div class="container">
  <div class="row">
    	<div class="col-md-8">
            <h4 class="page-head-line"><br>View Menu</h4>
        
              <img src="{{ asset('images/' . $tblmenu->menuImg)}} " alt= "This is a photo" height="300" width="500"/>

          	<h1>{{ $tblmenu->menuName }}</h1>
          	<h3>Php{{ $tblmenu->menuPrice }}</h3>
          	<p>{{ $tblmenu->menuDesc }}</p>
          	<hr>
    	</div>

    <br><br><br>
    	<div class="col-md-4">
    		<div class="well">
              <dl class="dl-horizontal">
                <label>URL:</label>
                <p><a href="{{ route('foods.single', $tblmenu->slug) }}">{{ route('foods.single', $tblmenu->slug )}}</a></p>
              </dl>
        			<dl class="dl-horizontal">
        				  <label>Create At:</label>
                  <p>{{ date('M j, Y h:ia', strtotime($tblmenu->created_at)) }}</p>
        			</dl>
      				<dl class="dl-horizontal">
          				<label>Last Updated:</label>
          				<p>{{ date('M j, Y h:ia', strtotime($tblmenu->updated_at)) }}</p>
          		</dl>
        			
    				
    				<div class="row">
      					<div class="col-sm-6">
                    {!! Html::linkRoute('menus.edit', 'Edit', array($tblmenu->menuId), array('class'=>'btn btn-primary btn-block')) !!}
      					</div>
      					<div class="col-sm-6">
                   {!! Form::open(['route'=>['menus.destroy', $tblmenu->menuId], 'method'=>'DELETE']) !!}
      					   {!! Form::submit('Delete',['class'=>'btn btn-danger btn-block'])!!}
                   {!! Form::close() !!}
      					</div>
                <div class="row">
                  <div class="col-md-12">
                  
                    {{Html::linkRoute('menus.index','<<See List of Foods', [], ['class'=>'btn btn-default btn-block btn-h1-spacing'])}}
                  </div>
                </div>
    				</div>
    		</div>
    	</div>
</div>
</div>

@endsection