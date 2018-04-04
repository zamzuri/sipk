@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
		{!! Form::model($pangkat, ['route' => ['pangkat.update', $pangkat], 'method' =>'patch'])!!}
			@include('pangkat._form', ['model' => $pangkat])
		{!! Form::close() !!}
	</div>
</div>
@endsection