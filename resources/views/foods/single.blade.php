@extends('layouts.main')
@section('title' , "| $post->title ")
@section('content')
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			
			<img src="{{ asset('images/' . $tblmenu->menuImg) }}" height="300" width="500" />
			
			<h1>{{ $tblmenu->menuName }}</h1>
			<p>{{ $tblmenu->menuDesc }}</p>
			<p>Php {{ $tblmenu->menuPrice }}</p>
			<hr>
			<p>Category Name : {{ $tblmenucategory->tblmenucategory->CategoryName }}</p>
			{{-- <p>Status : {{ $post->status->status }}</p> --}}
		</div>
	</div>


@endsection