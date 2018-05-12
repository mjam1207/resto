@extends('layouts.main')
@section ('title', '| Food Menu')
@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Food Menu</h1>
		</div>
	</div>

	@foreach($tblmenu as $tblmenu)
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>Category: {{ $tblmenu->menuName }}</h2>
			<h5>Price: {{ $tblmenu->menuPrice }}</h5>
			<h5>Created: {{ date ('M j, Y', strtotime($tblmenu->created_at)) }}</h5>

			<p>Description: {{ substr($tblmenu->menuDesc, 0, 250) }}
			{{ strlen($tblmenu->menuDesc) > 150 ? "..." : "" }}</p>

			<a href="{{ route('foods.single', $tblmenu->menuId) }}" class="btn btn-primary">Read More</a>
			<hr>
			
		</div>
	</div>
@endforeach

<div class="row">
	<div class="col-md-12">
		<div class="text-center">
			{!! $tblmenu->links() !!}
		</div>
	</div>
</div>

@endsection