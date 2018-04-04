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

            <h4 class="header-title m-t-0 m-b-30">Daftar Pangkat (Gol./Ruang) <small><a href="{{ route('pangkat.create') }}" class="btn btn-success btn-sm">Tambahkan Gol./ruang</a></small></h4>

            <table id="datatable" class="table table-striped nowrap"
                   cellspacing="0" width="100%">
                <thead>
					<tr>
						<td>No</td>
						<td>Nama Gol./Ruang</td>
						<td>Aksi</td>
					</tr>
				</thead>
				<tbody>
					<?php $n=1;?>
					@foreach($pangkat as $pkt)
						<tr>
							<td>{{$n}}</td>
							<td>{{ $pkt->nama }}</td>
							<td>
								{!! Form::model($pkt, ['route' => ['pangkat.destroy', $pkt], 'method' => 'delete', 'class' => 'form-inline'] ) !!}
								<a href="{{ route('pangkat.edit', $pkt->id)}}">Edit</a> |
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