@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        {!! Form::model($pegawai, ['route' => ['pegawai.update', $pegawai], 'method' =>'patch', 'files' => true,'class' =>'form-horizontal'])!!}
        <div class="panel panel-color panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Detail pegawai</h3>
                </div>
                <div class="panel-body">
                <div class="row">
                    <legend>Personal info</legend>
                    <div class="col-lg-6">
                        <div class="form-group {!! $errors->has('photo') ? 'has-error' : '' !!}">
                            {!! Form::label('photo', 'Photo', ['class' => 'col-md-3']) !!}
                            <div class="col-md-9">

                                 <p>
                                    <input type="hidden" name="MAX_UPLOAD_SIZE" value="250000">
                                    <img id="uploadedimage" width="200px" class="img-rounded" src="{{asset('img/'.$pegawai->photo)}}" />
                                </p>
                            </div>
                            {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('nama') ? 'has-error' : '' !!}">
                            {!! Form::label('nama', 'Nama lengkap', ['class' => 'col-md-3']) !!}
                            <div class="col-md-9">
                                <p class="form-control-static">{{$pegawai->full_name}}</p>
                            </div>
                            {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {!! $errors->has('ktp') ? 'has-error' : '' !!}">
                            {!! Form::label('ktp', 'Nomer KTP', ['class' => 'col-md-3']) !!}
                            <div class="col-md-9">
                                <p class="form-control-static">{{$pegawai->ktp}}</p>
                            </div>
                            {!! $errors->first('ktp', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {!! $errors->has('telepon') ? 'has-error' : '' !!}">
                            {!! Form::label('telepon', 'Telepon', ['class' => 'col-md-3']) !!}
                            <div class="col-md-9">
                                <p class="form-control-static">{{$pegawai->telepon}}</p>
                            </div>
                            {!! $errors->first('telepon', '<p class="help-block">:message</p>') !!}
                        </div>

                    </div><!-- end col -->

                    <div class="col-lg-6">

                        <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                            {!! Form::label('email', 'Email', ['class' => 'col-md-3']) !!}
                            <div class="col-md-9">
                                <p class="form-control-static">{{$pegawai->email}}</p>
                            </div>
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {!! $errors->has('tanggal_lahir') ? 'has-error' : '' !!}">
                            {!! Form::label('tanggal_lahir', 'Tanggal lahir', ['class' => 'col-md-3']) !!}
                            <div class="col-md-9">
                                <p class="form-control-static">{{$pegawai->tanggal_lahir}}</p>
                            </div>
                            {!! $errors->first('tanggal_lahir', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {!! $errors->has('usia') ? 'has-error' : '' !!}">
                            {!! Form::label('usia', 'Usia', ['class' => 'col-md-3']) !!}
                            <div class="col-md-9">
                                <p class="form-control-static">{{$pegawai->usia}} Th</p>
                            </div>
                            {!! $errors->first('usia', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {!! $errors->has('jenis_kelamin') ? 'has-error' : '' !!}">
                            {!! Form::label('jenis_kelamin', 'Jenis kelamin', ['class' => 'col-md-3']) !!}
                            <div class="col-md-9">
                                <p class="form-control-static">{{$pegawai->jenis_kelamin}}</p>
                            </div>
                            {!! $errors->first('jenis_kelamin', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {!! $errors->has('agama') ? 'has-error' : '' !!}">
                            {!! Form::label('agama', 'Agama', ['class' => 'col-md-3']) !!}
                            <div class="col-md-9">
                            <p class="form-control-static">{{$pegawai->agama}}</p>
                            </div>
                            {!! $errors->first('agama', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {!! $errors->has('detail_alamat') ? 'has-error' : '' !!}">
                            {!! Form::label('detail_alamat', 'Alamat Lengkap', ['class' => 'col-md-3']) !!}
                            <div class="col-md-9">
                                <p class="form-control-static">{{$pegawai->alamat_lengkap}}</p>
                            </div>
                            {!! $errors->first('detail_alamat', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div><!-- end col -->

                </div><!-- end row -->
                
                <div class="row">
                    <div class="col-lg-6">
                    <legend>Riwayat kepegawaian</legend>
                        <div class="form-group {!! $errors->has('nip') ? 'has-error' : '' !!}">
                            {!! Form::label('nip', 'NIP pegawai', ['class' => 'col-md-6']) !!}
                            <div class="col-md-6">
                                <p class="form-control-static">{{$pegawai->nip}}</p>
                            </div>
                            {!! $errors->first('nip', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('id_bidang') ? 'has-error' : '' !!}">
                            {!! Form::label('id_bidang', 'Nama bidang', ['class' => 'col-md-6']) !!}
                            <div class="col-md-6">
                                <p class="form-control-static">{{(isset($pegawai->bidang))?$pegawai->bidang->nama:''}}</p>
                            </div>
                            {!! $errors->first('id_bidang', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('id_pangkat') ? 'has-error' : '' !!}">
                            {!! Form::label('id_pangkat', 'Nama pangkat', ['class' => 'col-md-6']) !!}
                            <div class="col-md-6">
                                <p class="form-control-static">{{(isset($pegawai->pangkat))?$pegawai->pangkat->nama:''}}</p>
                            </div>
                            {!! $errors->first('id_pangkat', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('tanggal_diangkat') ? 'has-error' : '' !!}">
                            {!! Form::label('tanggal_diangkat', 'Tanggal diangkat', ['class' => 'col-md-6']) !!}
                            <div class="col-md-6">
                                <p class="form-control-static">{{$pegawai->tanggal_diangkat}}</p>
                            </div>
                            {!! $errors->first('tanggal_diangkat', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('id_golongan') ? 'has-error' : '' !!}">
                            {!! Form::label('id_golongan', 'Nama golongan', ['class' => 'col-md-6']) !!}
                            <div class="col-md-6">
                                <p class="form-control-static">{{(isset($pegawai->golongan))?$pegawai->golongan->nama:''}}</p>
                            </div>
                            {!! $errors->first('id_golongan', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('tmt_pangkat') ? 'has-error' : '' !!}">
                            {!! Form::label('tmt_pangkat', 'Terhitung mulai tanggal pangkat', ['class' => 'col-md-6']) !!}
                            <div class="col-md-6">
                                <p class="form-control-static">{{$pegawai->tmt_pangkat}}</p>
                            </div>
                            {!! $errors->first('tmt_pangkat', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('id_jabatan') ? 'has-error' : '' !!}">
                            {!! Form::label('id_jabatan', 'Nama jabatan', ['class' => 'col-md-6']) !!}
                            <div class="col-md-6">
                                <p class="form-control-static">{{(isset($pegawai->jabatan))?$pegawai->jabatan->nama:''}}</p>
                            </div>
                            {!! $errors->first('id_jabatan', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('tmt_jabatan') ? 'has-error' : '' !!}">
                            {!! Form::label('tmt_jabatan', 'Terhitung mulai tanggal jabatan', ['class' => 'col-md-6']) !!}
                            <div class="col-md-6">
                                <p class="form-control-static">{{$pegawai->tmt_jabatan}}</p>
                            </div>
                            {!! $errors->first('tmt_jabatan', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('id_jabatan_fungsional') ? 'has-error' : '' !!}">
                            {!! Form::label('id_jabatan_fungsional', 'Jabatan fungsional', ['class' => 'col-md-6']) !!}
                            <div class="col-md-6">
                                <p class="form-control-static">{{(isset($pegawai->jabatanfungsional))?$pegawai->jabatanfungsional->nama:''}}-{{(isset($pegawai->subfungsional))?$pegawai->subfungsional->nama_sub_fungsional:''}}</p>
                                <p class="form-control-static"></p>
                            </div>
                            {!! $errors->first('id_sub_fungsional', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div><!-- end col --> 
                    
                    <div class="col-lg-6">
                    <legend>Riwayat masa kerja</legend>
                        <div class="form-group {!! $errors->has('tanggal_mulai_kerja') ? 'has-error' : '' !!}">
                            {!! Form::label('tanggal_mulai_kerja', 'Tanggal mulai kerja', ['class' => 'col-md-3']) !!}
                            <div class="col-md-9">
                                <p class="form-control-static">{{$pegawai->tanggal_mulai_kerja}}</p>
                            </div>
                            {!! $errors->first('tanggal_mulai_kerja', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('tahun_masa_kerja') ? 'has-error' : '' !!}">
                            {!! Form::label('tahun_masa_kerja', 'Tahun masa kerja', ['class' => 'col-md-3']) !!}
                            <div class="col-md-9">
                                <p class="form-control-static">{{$pegawai->tahun_masa_kerja}}</p>
                            </div>
                            {!! $errors->first('tahun_masa_kerja', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('bulan_masa_kerja') ? 'has-error' : '' !!}">
                            {!! Form::label('bulan_masa_kerja', 'Bulan masa kerja', ['class' => 'col-md-3']) !!}
                            <div class="col-md-9">
                                <p class="form-control-static">{{$pegawai->bulan_masa_kerja}}</p>
                            </div>
                            {!! $errors->first('bulan_masa_kerja', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('npwp') ? 'has-error' : '' !!}">
                            {!! Form::label('npwp', 'Nomer NPWP', ['class' => 'col-md-3']) !!}
                            <div class="col-md-9">
                                <p class="form-control-static">{{$pegawai->npwp}}</p>
                            </div>
                            {!! $errors->first('npwp', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('status') ? 'has-error' : '' !!}">
                            {!! Form::label('status', 'Status pegawai', ['class' => 'col-md-3']) !!}
                            <div class="col-md-9">
                                <p class="form-control-static">{{$pegawai->status}}</p>
                            </div>
                            {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('tanggal_keluar') ? 'has-error' : '' !!}">
                            {!! Form::label('tanggal_keluar', 'Tanggal keluar', ['class' => 'col-md-3']) !!}
                            <div class="col-md-9">
                                <p class="form-control-static">{{$pegawai->tanggal_keluar}}</p>
                            </div>
                            {!! $errors->first('tanggal_keluar', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>

                <div class="row">   
                    <div class="col-lg-6">
                    <legend>Riwayat pendidikan</legend>
                        <div class="form-group {!! $errors->has('pendidikan_terakhir') ? 'has-error' : '' !!}">
                            {!! Form::label('pendidikan_terakhir', 'Pendidikan terakhir', ['class' => 'col-md-6']) !!}
                            <div class="col-md-6">
                                <p class="form-control-static">{{$pegawai->pendidikan_terakhir}}</p>
                            </div>
                            {!! $errors->first('pendidikan_terakhir', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('jurusan_pendidikan') ? 'has-error' : '' !!}">
                            {!! Form::label('jurusan_pendidikan', 'Jurusan pendidikan', ['class' => 'col-md-6']) !!}
                            <div class="col-md-6">
                                <p class="form-control-static">{{$pegawai->jurusan_pendidikan}}</p>
                            </div>
                            {!! $errors->first('jurusan_pendidikan', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('tahun_lulus') ? 'has-error' : '' !!}">
                            {!! Form::label('tahun_lulus', 'Tahun lulus', ['class' => 'col-md-6']) !!}
                            <div class="col-md-6">
                                <p class="form-control-static">{{$pegawai->tahun_lulus}}</p>
                            </div>
                            {!! $errors->first('tahun_lulus', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div><!-- end col -->

                    <div class="col-lg-6">
                    <legend>Riwayat latihan jabatan</legend>
                        <div class="form-group {!! $errors->has('nama_latihan_jabatan') ? 'has-error' : '' !!}">
                            {!! Form::label('nama_latihan_jabatan', 'Nama latihan jabatan', ['class' => 'col-md-3']) !!}
                            <div class="col-md-9">
                                <p class="form-control-static">{{$pegawai->nama_latihan_jabatan}}</p>
                            </div>
                            {!! $errors->first('nama_latihan_kerja', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('waktu_latihan_jabatan') ? 'has-error' : '' !!}">
                            {!! Form::label('waktu_latihan_jabatan', 'Waktu latihan jabatan', ['class' => 'col-md-3']) !!}
                            <div class="col-md-9">
                                <p class="form-control-static">{{$pegawai->tanggal_latihan_jabatan}}</p>
                            </div>
                            {!! $errors->first('waktu_latihan_jabatan', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {!! $errors->has('jumlah_jam_latihan_jabatan') ? 'has-error' : '' !!}">
                            {!! Form::label('jumlah_jam_latihan_jabatan', 'Jumlah jam', ['class' => 'col-md-3']) !!}
                            <div class="col-md-9">
                                <p class="form-control-static">{{$pegawai->jumlah_jam_latihan_jabatan}} jam</p>
                            </div>
                            {!! $errors->first('jumlah_jam_latihan_jabatan', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div> 
                </div><!-- end row -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection



