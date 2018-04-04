@extends('layouts.app')
@section('content')
<div class="row">
	<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Print Pdf</h4>
                </div>
                <div class="modal-body">
                	<div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="radio radio-info radio-inline">
		                            <input type="radio" id="inlineRadio1" value="option1" name="radioInline">
		                            <label for="inlineRadio1"> All </label>
		                        </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="radio" id="inlineRadio2" value="option2" name="radioInline">
	                            <label for="inlineRadio2"> Pilih Nama : </label>
	                            <input type="email" class="form-control" id="exampleInputEmail21" placeholder="Enter email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            	<input type="radio" id="inlineRadio3" value="option3" name="radioInline">
                                <label for="field-3" class="control-label">Pilih berdasarkan :</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-md-12">
	                    	<form class="form-inline" role="form">
	                            <div class="form-group">
	                                <div class="checkbox checkbox-primary">
	                                    <input id="checkbox3" type="checkbox">
	                                    <label for="checkbox3">Bidang</label>
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                {!! Form::select('id_bidang', [''=>'Pilih']+App\Bidang::lists('nama','id')->all(), null, ['class'=>'form-control']) !!}
	                            </div>
	                            <br/>
	                            <div class="form-group">
	                                <div class="checkbox checkbox-primary">
	                                    <input id="checkbox3" type="checkbox">
	                                    <label for="checkbox3">Jabatan</label>
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                {
	                            </div>
	                            <div class="form-group">
	                                
	                            </div>
	                            <br/>
	                            <div class="form-group">
	                                <div class="checkbox checkbox-primary">
	                                    <input id="checkbox3" type="checkbox">
	                                    <label for="checkbox3">Pangkat</label>
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                {!! Form::select('id_pangkat', [''=>'Pilih']+App\Pangkat::lists('nama','id')->all(),null, ['class'=>'form-control','id'=>'id_pangkat']) !!}
	                            </div>
	                            <br/>
	                            <div class="form-group">
	                                <div class="checkbox checkbox-primary">
	                                    <input id="checkbox3" type="checkbox">
	                                    <label for="checkbox3">Golongan</label>
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                
	                            </div>
	                        </form>
	                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info waves-effect waves-light">Generate</button>

                </div>
            </div>
        </div>
    </div><!-- /.modal -->
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="header-title m-t-0 m-b-30">Daftar pegawai <small><a href="{{ route('pegawai.create') }}" class="btn btn-success btn-sm">Tambah pegawai baru</a></small></h4>

            <table id="datatable" class="table table-striped nowrap"
                   cellspacing="0" width="100%">
                <thead>
					<tr>
						<td>No</td>
						<td></td>
						<td>NIP</td>
						<td>Nama Pegawai</td>
						<td>Jabatan</td>
						<td>Password</td>
						<td>action</td>
					</tr>
				</thead>
				<tbody>
					<?php $n=1;?>
					@foreach($pegawai as $row)
						<tr>
							<td>{{$n}}</td>
							<td><img class="img-circle" src="http://placehold.it/140X100" style="width: 40px; height: 40px;" /></td>
							<td>{{ $row->nip }}</td>
							<td>{{ $row->nama }}</td>
							<td>{{ $row->jabatan }}</td>
							<td></td>
							<td>
								{!! Form::model($row, ['route' => ['pegawai.destroy', $row], 'method' => 'delete', 'class' => 'form-inline'] ) !!}
								<a href="{{ url('file/browser', $row->id)}}" class="btn btn-xs btn-purple">Browser file</a> | <a href="{{ route('pegawai.edit', $row->id)}}" class="btn btn-xs btn-warning">Edit</a> | <a href="{{ route('pegawai.show', $row->id)}}" class="btn btn-xs btn-info">Detail</a> |
								{!! Form::submit('delete', ['class'=>'btn btn-xs btn-danger js-submit-confirm']) !!}
								{!! Form::close()!!}
							</td>
						</tr>
					<?php $n++;?>
					@endforeach
				</tbody>
            </table>
        </div>
    </div><!-- end col -->
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