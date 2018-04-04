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

            <h4 class="header-title m-t-0 m-b-30">Daftar Jabatan fungsional <small><a href="{{ route('fungsional.create') }}" class="btn btn-success btn-sm">Tambahkan jabatan fungsional</a></small></h4>

            <table id="datatable" class="table table-striped nowrap"
                   cellspacing="0" width="100%">
                <thead>
					<tr>
						<td>No</td>
						<td>Nama jabatan fungsional</td>
						<td>Aksi</td>
					</tr>
				</thead>
				<tbody>
					<?php $n=1;?>
					@foreach($fungsional as $row)
						<tr>
							<td>{{$n}}</td>
							<td>{{ $row->nama }}</td>
							<td>
								{!! Form::model($row, ['route' => ['fungsional.destroy', $row], 'method' => 'delete', 'class' => 'form-inline'] ) !!}
								<a href="{{ route('fungsional.edit', $row->id)}}">Edit</a> |
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