<div class="card-box">

    <div class="dropdown pull-right">
        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
            <i class="zmdi zmdi-more-vert"></i>
        </a>
    </div>

    <h3 class="header-title m-t-0 m-b-30">{{ isset($model)?"Edit Pegawai dengan Nama $pegawai->nama" : "Input pegawai baru" }}</h3>

    <div class="row">
        <legend>Personal info</legend>
        <div class="col-lg-6">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group {!! $errors->has('photo') ? 'has-error' : '' !!}">
                {!! Form::label('photo', 'Photo', ['class' => 'col-md-3']) !!}
                <div class="col-md-9">

                     <p>
                        <input type="hidden" name="MAX_UPLOAD_SIZE" value="250000">
                        <img id="uploadedimage" width="200px" class="img-rounded" src="{{isset($model)?asset('img/'.$pegawai->photo):''}}" />
                        <input type="file" name="photo" id="jimage" accept="image/jpeg">
                    </p>
                    <span id="imageerror" style="font-weight: bold; color: red">image max 25 mb</span> |
                    <span>Photo tidak wajib di isi!</span>
                </div>
                {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {!! $errors->has('nama') ? 'has-error' : '' !!}">
                {!! Form::label('nama', 'Nama lengkap', ['class' => 'col-md-3']) !!}
                <div class="col-md-9">
                    {!! Form::text('nama', null, ['class'=>'form-control']) !!}
                    {!! Form::hidden('user_id', isset($model)?$pegawai->user_id:'', ['class'=>'form-control']) !!}
                </div>
                {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group {!! $errors->has('ktp') ? 'has-error' : '' !!}">
                {!! Form::label('ktp', 'Nomer KTP', ['class' => 'col-md-3']) !!}
                <div class="col-md-9">
                    {!! Form::text('ktp', null, ['class'=>'form-control']) !!}
                </div>
                {!! $errors->first('ktp', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group {!! $errors->has('telepon') ? 'has-error' : '' !!}">
                {!! Form::label('telepon', 'Telepon', ['class' => 'col-md-3']) !!}
                <div class="col-md-9">
                    {!! Form::text('telepon', null, ['class'=>'form-control']) !!}
                </div>
                {!! $errors->first('telepon', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                {!! Form::label('email', 'Email', ['class' => 'col-md-3']) !!}
                <div class="col-md-9">
                    {!! Form::text('email', null, ['class'=>'form-control']) !!}
                </div>
                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
            </div>
        </div><!-- end col -->

        <div class="col-lg-6">
            <div class="form-group {!! $errors->has('tempat_lahir') ? 'has-error' : '' !!}">
                {!! Form::label('tempat_lahir', 'Tempat lahir', ['class' => 'col-md-3']) !!}
                <div class="col-md-9">
                    {!! Form::text('tempat_lahir', null, ['class'=>'form-control']) !!}
                </div>
                {!! $errors->first('tempat_lahir', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group {!! $errors->has('tanggal_lahir') ? 'has-error' : '' !!}">
                {!! Form::label('tanggal_lahir', 'Tanggal lahir', ['class' => 'col-md-3']) !!}
                <div class="col-md-9">
                    {!! Form::text('tanggal_lahir', null, ['class'=>'form-control','id'=>'tanggal_lahir']) !!}
                </div>
                {!! $errors->first('tanggal_lahir', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group {!! $errors->has('usia') ? 'has-error' : '' !!}">
                {!! Form::label('usia', 'Usia', ['class' => 'col-md-3']) !!}
                <div class="col-md-9">
                    {!! Form::text('usia', null, ['class'=>'form-control','id' => 'umur']) !!}
                </div>
                {!! $errors->first('usia', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group {!! $errors->has('jenis_kelamin') ? 'has-error' : '' !!}">
                {!! Form::label('jenis_kelamin', 'Jenis kelamin', ['class' => 'col-md-3']) !!}
                <div class="col-md-9">
                    <div class="radio radio-info radio-inline">
                        {!! Form::radio('jenis_kelamin', 'Laki-laki', true, ['class'=>'form-control']) !!}
                        <label for="inlineRadio1"> Laki-laki </label>
                    </div>
                    <div class="radio radio-inline">
                        {!! Form::radio('jenis_kelamin', 'Perempuan', false, ['class'=>'form-control']) !!}
                        <label for="inlineRadio2"> Perempuan </label>
                    </div>
                </div>
                {!! $errors->first('jenis_kelamin', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group {!! $errors->has('agama') ? 'has-error' : '' !!}">
                {!! Form::label('agama', 'Agama', ['class' => 'col-md-3']) !!}
                <div class="col-md-9">
                {{ Form::select('agama', ['Islam'=>'Islam', 'Kristen'=>'Kristen', 'Katholik'=>'Katholik', 'Hindu'=>'Hindu', 'Budha'=>'Budha'],null,['class' => 'form-control']) }}
                </div>
                {!! $errors->first('agama', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group {!! $errors->has('detail_alamat') ? 'has-error' : '' !!}">
                {!! Form::label('detail_alamat', 'Alamat Lengkap', ['class' => 'col-md-3']) !!}
                <div class="col-md-9">
                    {!! Form::textarea('detail_alamat', null, ['class'=>'form-control','size' => '30x3']) !!}
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
                    {!! Form::text('nip', null, ['class'=>'form-control']) !!}
                </div>
                {!! $errors->first('nip', '<p class="help-block">:message</p>') !!}
            </div>
             <div class="form-group {!! $errors->has('pangkat_id') ? 'has-error' : '' !!}">
                {!! Form::label('pangkat_id', 'Nama pangkat (GOL./Ruang)', ['class' => 'col-md-6']) !!}
                <div class="col-md-6">
                    {!! Form::select('pangkat_id', [''=>'Pilih']+App\Pangkat::lists('nama','id')->all(), isset($model) ? $pegawai->pangkat_id : null, ['class'=>'form-control','id'=>'id_pangkat']) !!}
                </div>
                {!! $errors->first('pangkat_id', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {!! $errors->has('tmt_pangkat') ? 'has-error' : '' !!}">
                {!! Form::label('tmt_pangkat', 'TMT pangkat', ['class' => 'col-md-6']) !!}
                <div class="col-md-6">
                    {!! Form::text('tmt_pangkat', null, ['class'=>'form-control','id'=>'tmt_pangkat']) !!}
                </div>
                {!! $errors->first('tmt_pangkat', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {!! $errors->has('pangkat_gol_cpns') ? 'has-error' : '' !!}">
                {!! Form::label('pangkat_gol_cpns', 'Gol./Ruang CPNS', ['class' => 'col-md-6']) !!}
                <div class="col-md-6">
                    {!! Form::select('pangkat_gol_cpns', [''=>'Pilih']+App\Pangkat::lists('nama')->all(), isset($model) ? $pegawai->pangkat_gol_cpns : null, ['class'=>'form-control']) !!}
                </div>
                {!! $errors->first('pangkat_gol_cpns', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {!! $errors->has('tmt_pangkat_gol_cpns') ? 'has-error' : '' !!}">
                {!! Form::label('tmt_pangkat_gol_cpns', 'TMT pangkat gol./ruang CPNS', ['class' => 'col-md-6']) !!}
                <div class="col-md-6">
                    {!! Form::text('tmt_pangkat_gol_cpns', null, ['class'=>'form-control','id'=>'tmt_pangkat']) !!}
                </div>
                {!! $errors->first('tmt_pangkat_gol_cpns', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {!! $errors->has('jabatan') ? 'has-error' : '' !!}">
                {!! Form::label('jabatan', 'Nama Jabatan', ['class' => 'col-md-6']) !!}
                <div class="col-md-6">
                    {!! Form::text('jabatan', null, ['class'=>'form-control']) !!}
                </div>
                {!! $errors->first('jabatan', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {!! $errors->has('tmt_jabatan') ? 'has-error' : '' !!}">
                {!! Form::label('tmt_jabatan', 'TMT jabatan', ['class' => 'col-md-6']) !!}
                <div class="col-md-6">
                    {!! Form::text('tmt_jabatan', null, ['class'=>'form-control','id'=>'tmt_jabatan']) !!}
                </div>
                {!! $errors->first('tmt_jabatan', '<p class="help-block">:message</p>') !!}
            </div>
        </div><!-- end col --> 
        
        <div class="col-lg-6">
        <legend>Riwayat masa kerja</legend>
            <div class="form-group {!! $errors->has('tahun_masa_kerja') ? 'has-error' : '' !!}">
                {!! Form::label('tahun_masa_kerja', 'Tahun masa kerja', ['class' => 'col-md-3']) !!}
                <div class="col-md-9">
                    {!! Form::text('tahun_masa_kerja', null, ['class'=>'form-control']) !!}
                </div>
                {!! $errors->first('tahun_masa_kerja', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {!! $errors->has('bulan_masa_kerja') ? 'has-error' : '' !!}">
                {!! Form::label('bulan_masa_kerja', 'Bulan masa kerja', ['class' => 'col-md-3']) !!}
                <div class="col-md-9">
                    {!! Form::text('bulan_masa_kerja', null, ['class'=>'form-control']) !!}
                </div>
                {!! $errors->first('bulan_masa_kerja', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>

    <div class="row">   
        <div class="col-lg-6">
            <legend>Riwayat latihan jabatan</legend>
            <div class="form-group {!! $errors->has('nama_latihan_jabatan') ? 'has-error' : '' !!}">
                {!! Form::label('nama_latihan_jabatan', 'Nama latihan jabatan', ['class' => 'col-md-4']) !!}
                <div class="col-md-6">
                    {!! Form::text('nama_latihan_jabatan', null, ['class'=>'form-control']) !!}
                </div>
                {!! $errors->first('nama_latihan_jabatan', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {!! $errors->has('thn_bln_latihan_jabatan') ? 'has-error' : '' !!}">
                {!! Form::label('thn_bln_latihan_jabatan', 'Bln dan Thn latihan jabatan', ['class' => 'col-md-4']) !!}
                <div class="col-md-6">
                    {!! Form::text('thn_bln_latihan_jabatan', null, ['class'=>'form-control']) !!}
                </div>
                {!! $errors->first('thn_bln_latihan_jabatan', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {!! $errors->has('jumlah_jam_latihan_jabatan') ? 'has-error' : '' !!}">
                {!! Form::label('jumlah_jam_latihan_jabatan', 'Jumlah jam', ['class' => 'col-md-4']) !!}
                <div class="col-md-6">
                    {!! Form::text('jumlah_jam_latihan_jabatan', null, ['class'=>'form-control']) !!}
                </div>
                {!! $errors->first('jumlah_jam_latihan_jabatan', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-lg-6">
            <legend>Riwayat pendidikan</legend>
            <div class="form-group {!! $errors->has('nama_pendidikan') ? 'has-error' : '' !!}">
                {!! Form::label('nama_pendidikan', 'Nama lembaga pendidikan', ['class' => 'col-md-6']) !!}
                <div class="col-md-6">
                    {!! Form::text('nama_pendidikan', null, ['class'=>'form-control']) !!}
                </div>
                {!! $errors->first('nama_pendidikan', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {!! $errors->has('jurusan_pendidikan') ? 'has-error' : '' !!}">
                {!! Form::label('jurusan_pendidikan', 'Jurusan', ['class' => 'col-md-6']) !!}
                <div class="col-md-6">
                    {!! Form::text('jurusan_pendidikan', null, ['class'=>'form-control']) !!}
                </div>
                {!! $errors->first('jurusan_pendidikan', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {!! $errors->has('tahun_lulus') ? 'has-error' : '' !!}">
                {!! Form::label('tahun_lulus', 'Tahun lulus', ['class' => 'col-md-6']) !!}
                <div class="col-md-6">
                    {!! Form::text('tahun_lulus', null, ['class'=>'form-control','id'=>'tahun_lulus']) !!}
                </div>
                {!! $errors->first('tahun_lulus', '<p class="help-block">:message</p>') !!}
            </div>
             <div class="form-group {!! $errors->has('tingkat_ijazah') ? 'has-error' : '' !!}">
                {!! Form::label('tingkat_ijazah', 'Tingkat ijazah', ['class' => 'col-md-6']) !!}
                <div class="col-md-6">
                    {{ Form::select('tingkat_ijazah', ['SMP/SLTP/MTS'=>'SMP/SLTP/MTS','SMA/SMK/MA'=>'SMA/SMK/MA', 'S1'=>'S1', 'S2'=>'S2', 'S3'=>'s3'],null,['class' => 'form-control']) }}
                </div>
                {!! $errors->first('tingkat_ijazah', '<p class="help-block">:message</p>') !!}
            </div>
        </div><!-- end col -->
        <div class="col-lg-6">
            <div class="form-group {!! $errors->has('mutasi') ? 'has-error' : '' !!}">
                {!! Form::label('mutasi', 'Mutasi kepegawaian', ['class' => 'col-md-3']) !!}
                <div class="col-md-9">
                    {!! Form::text('mutasi', null, ['class'=>'form-control']) !!}
                </div>
                {!! $errors->first('mutasi', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {!! $errors->has('batas_pensiun') ? 'has-error' : '' !!}">
                {!! Form::label('batas_pensiun', 'Batas pensiun', ['class' => 'col-md-3']) !!}
                <div class="col-md-9">
                    {!! Form::text('batas_pensiun', null, ['class'=>'form-control']) !!}
                </div>
                {!! $errors->first('batas_pensiun', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9 m-t-15">
                {!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-success']) !!}
                <button type="reset" class="btn waves-effect m-l-5">
                    Cancel
                </button>
            </div>
        </div>  
    </div><!-- end row -->
</div>


