@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-3">
        <div class="text-center card-box" style="min-height: 377px;">
            <div class="dropdown pull-right">
                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                    <i class="zmdi zmdi-more-vert"></i>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="">Detail profil</a></li>
                </ul>
            </div>
            <div>
                <img src="{{asset('img/'.$pegawai->photo)}}" class="img-circle thumb-xl img-thumbnail m-b-10" alt="profile-image">

                <p class="text-muted font-13 m-b-30">
                    <blockquote>
                        <p>Hi I'm {{$pegawai->nama}}</p>
                        <footer>
                            Bidang : {{isset($pegawai->bidang)?$pegawai->bidang->nama:''}}, Jabatan : {{isset($pegawai->jabatan)?$pegawai->jabatan->nama:''}} | <?php echo isset($pegawai->pangkat)?"<label class='label label-info'>".$pegawai->pangkat->nama."</label>":''?>
                        </footer>
                    </blockquote>
                </p>

                <div class="text-left">
                    <p class="text-muted font-13"><strong>Full Name :</strong> <span class="m-l-15">{{$pegawai->FullName}}</span></p>

                    <p class="text-muted font-13"><strong>Mobile :</strong><span class="m-l-15">{{$pegawai->telepo}}</span></p>

                    <p class="text-muted font-13"><strong>Email :</strong> <span class="m-l-15">{{$pegawai->email}}</span></p>

                    <p class="text-muted font-13 m-b-5"><strong>Jam masuk kerja :</strong> <span class="m-l-15">7.30 wib</span></p>

                    <p class="text-muted font-13 m-b-5"><strong>Jam pulang kerja :</strong> <span class="m-l-15">16.00 wib</span></p>

                </div>

            </div>

        </div>
    </div>
    <div class="col-md-9">
        <div class="card-box table-responsive">
            <div class="dropdown pull-right">
                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                    <i class="zmdi zmdi-more-vert"></i>
                </a>
            </div>

            <h4 class="header-title m-t-0 m-b-30">Daftar file saya</h4>

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
                                <a href="{{ url('preview/'.$row->file.$row->nama)}}" class="btn btn-xs btn-purple">Preview</a> 
                                     | 
                                <a href="{{ url('download/'.$row->id.'/'.$pegawai->id)}}" class="btn btn-xs btn-warning">Download</a>
                            </td>
						</tr>
						<?php $n++;?>
						@endforeach
					@endif
				</tbody>
            </table>

            <div id="absensi"></div>
        </div>
    </div><!-- end col -->
</div>
<!-- end row -->
@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').dataTable();
        $('#absensi').load("http://10.15.5.11:81/siap/iframe4simpeg.php?nip=196403091990072001");
    } );

    TableManageButtons.init();

</script>
@endpush