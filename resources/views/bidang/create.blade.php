@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
		{!! Form::open(['route' => 'bidang.store'])!!}
			@include('bidang._form')
		{!! Form::close() !!}
	</div>
</div>
@endsection