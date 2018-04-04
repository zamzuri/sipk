@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
		{!! Form::model($bidang, ['route' => ['bidang.update', $bidang], 'method' =>'patch'])!!}
			@include('bidang._form', ['model' => $bidang])
		{!! Form::close() !!}
	</div>
</div>
@endsection