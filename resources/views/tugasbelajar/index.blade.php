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

            <h4 class="header-title m-t-0 m-b-30">Daftar pegawai yang tugas belajar <small><a href="{{ route('tugasbelajar.create') }}" class="btn btn-success btn-sm">Tambahkan</a></small></h4>

            <table id="datatable" class="table table-striped nowrap"
                   cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama pegawai</td>
                        <td>Tahun belajar</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $n=1;?>
                    @foreach($tugasbelajar as $row)
                        <tr>
                            <td>{{$n}}</td>
                            <td>{{ $row->pegawai->nama }}</td>
                            <td>{{ $row->tahun_belajar }}</td>
                            <td>
                                {!! Form::model($row, ['route' => ['tugasbelajar.destroy', $row], 'method' => 'delete', 'class' => 'form-inline'] ) !!}
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