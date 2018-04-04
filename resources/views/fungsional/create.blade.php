@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
		{!! Form::open(['route' => 'fungsional.store'])!!}
			@include('fungsional._form')
		{!! Form::close() !!}
	</div>
</div>
@endsection