@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
		{!! Form::open(['route' => 'pegawai.store', 'files' => true, 'class' =>'form-horizontal'])!!}
			@include('pegawai._form')
		{!! Form::close() !!}
	</div>
</div>
@endsection
@push('scripts')
<script>
	$('#tanggal_lahir').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    $('#tmt_pangkat').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    $('#tmt_jabatan').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    $('#tanggal_mulai_kerja').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    $('#tanggal_diangkat').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    $('#tanggal_keluar').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    $('#tahun_lulus').datepicker({
        autoclose: true,
        format: " yyyy",
	    viewMode: "years", 
	    minViewMode: "years"
    });
    $('#tanggal_latihan_jabatan').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    $("input[name='jumlah_jam_latihan_jabatan']").TouchSpin({
        buttondown_class: "btn btn-custom",
        buttonup_class: "btn btn-custom"
    });

    $('#tanggal_lahir').on('change', function() {
        var dob = new Date($('#tanggal_lahir').val());
        var today = new Date();
        var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
        $('#umur').val(age);
    });

    $('#tanggal_mulai_kerja').on('change', function() {
        var dob = new Date($('#tanggal_mulai_kerja').val());
        var today = new Date();
        var thn = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
        $('#tahun_kerja').val(thn);
    });

    $(document).ready(function() {
        document.getElementById("jimage").onchange = function () {
            var reader = new FileReader();

            reader.onload = function (e) {
                if (e.total > 250000) {
                    $('#imageerror').text('Image too large');
                    $jimage = $("#jimage");
                    $jimage.val("");
                    $jimage.wrap('<form>').closest('form').get(0).reset();
                    $jimage.unwrap();
                    $('#uploadedimage').removeAttr('src');
                    return;
                }
                $('#imageerror').text('');
                document.getElementById("uploadedimage").src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        };
    });
</script>
@endpush