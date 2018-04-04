@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
    	<div class="card-box">

            <h5>Preview berkas</h5>
	    	<iframe src="http://docs.google.com/viewer?url={{ asset($source.$file) }}&embedded=true" style="width:1210px; height:700px;" frameborder="0">
			</iframe>
        </div>
    </div>
</div>
@endsection