@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <div class="dropdown pull-right">
                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                    <i class="zmdi zmdi-more-vert"></i>
                </a>
            </div>

            <h4 class="header-title m-t-0 m-b-30">Daftar file milik <span class="label label-info">{{$pegawai->nama}}</span> <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#panel-modal">Tambah file baru</button></h4>

            <table id="datatable" class="table table-striped nowrap"
                   cellspacing="0" width="100%">
                <thead>
					<tr>
						<td>No</td>
						<td>Nama file</td>
						<td>Ukuran file</td>
						<td>Create at</td>
						<td>action</td>
					</tr>
				</thead>
				<tbody>
					<?php $n=1;?>
					@if ($pegawai->files->count() > 0)
						@foreach($pegawai->files as $row)
						<tr>
							<td>{{$n}}</td>
							<td>{{ $row->nama }}</td>
							<td><label class="label label-info">{{ $row->size }} kb</label></td>
							<td>{{ $row->created_at }}</td>
							<td>
								{!! Form::open(['url' => ['file/destroy', $row->id], 'method' => 'delete', 'class' => 'form-inline'] ) !!}
								<a href="{{ url('preview/'.$row->file.$row->nama)}}" class="btn btn-xs btn-purple">Preview</a> 
								 | 
								{!! Form::submit('Delete', ['class'=>'btn btn-xs btn-danger js-submit-confirm']) !!}
								{!! Form::close()!!}
							</td>
						</tr>
						<?php $n++;?>
						@endforeach
					@endif
				</tbody>
            </table>
        </div>
    </div><!-- end col -->
    <div id="panel-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content p-0 b-0">
                <div class="panel panel-color panel-primary">
                	<div class="modal-content">
	                    <div class="panel-heading">
	                        <button type="button" class="close m-t-5" data-dismiss="modal" aria-hidden="true">×</button>
	                        <h3 class="panel-title">Upload file</h3>
	                    </div>
	                    {!! Form::open(['url' => 'file/upload', 'files' => true, 'class' =>'form-horizontal'])!!}
						<div class="panel-body">
	                        <div class="row">
	                            <div class="col-md-12">
	                                <div class="form-group">
		                                {!! Form::label('nama', 'Insert file',['class' => 'col-md-2']) !!}
										<div class="col-md-6">
											{!! Form::hidden('pegawai_id', $pegawai->id, ['class'=>'form-control']) !!}
											{!! Form::file('file', null, ['class'=>'form-control']) !!}
										</div>
	                                 </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="modal-footer">
	                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
	                        <button type="submit" class="btn btn-info waves-effect waves-light">Upload</button>
	                    </div>
	                    {!! Form::close() !!}
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
<!-- end row -->
@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').dataTable();
    } );

    TableManageButtons.init();

</script>
@endpush