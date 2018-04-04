@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
		{!! Form::model($fungsional, ['route' => ['fungsional.update', $fungsional], 'method' =>'patch'])!!}
			@include('fungsional._form', ['model' => $fungsional])
		{!! Form::close() !!}
	</div>
</div>
@endsection