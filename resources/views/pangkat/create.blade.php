@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
		{!! Form::open(['route' => 'pangkat.store'])!!}
			@include('pangkat._form')
		{!! Form::close() !!}
	</div>
</div>
@endsection

