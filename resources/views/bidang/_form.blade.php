<div class="card-box">

    <div class="dropdown pull-right">
        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
            <i class="zmdi zmdi-more-vert"></i>
        </a>
    </div>

    <h4 class="header-title m-t-0 m-b-30">Input bidang</h4>

    <div class="row">
	    <div class="col-lg-12">
	    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		    <div class="form-group {!! $errors->has('nama') ? 'has-error' : '' !!}">
				{!! Form::label('nama', 'Nama Bidang',['class' => 'col-md-3']) !!}
				<div class="col-md-4">
					{!! Form::text('nama', null, ['class'=>'form-control']) !!}
				</div>
				{!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
			</div>
			<div class="form-group">
	            <div class="col-sm-offset-3 col-sm-9 m-t-15">
	                {!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-success']) !!}
	                <button type="reset" class="btn waves-effect m-l-5">
	                    Cancel
	                </button>
	            </div>
	        </div>
		</div>
	</div>
</div>