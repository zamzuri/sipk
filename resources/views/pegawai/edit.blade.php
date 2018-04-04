@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
		{!! Form::model($pegawai, ['route' => ['pegawai.update', $pegawai], 'method' =>'patch', 'files' => true,'class' =>'form-horizontal'])!!}
			@include('pegawai._form', ['model' => $pegawai])
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

    
    $('#bulan_masa_kerja').datepicker({
        autoclose: true,
        todayHighlight: true,
        format:'mm',
        viewMode: "months", 
	    minViewMode: "months"
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


    $(document).ready(function () {
    	if($('#jabatan').length > 0) {
            var selected = $('#jabatan').val()
            if(selected === '') {
                $('#jabatan_struktural').hide();
                $('#jabatan_fungsional').hide();
            }

            if(selected === '1') {
                $('#jabatan_struktural').hide();
                $('#jabatan_fungsional').show();
            }

            if(selected === '2') {
                $('#jabatan_struktural').show();
                $('#jabatan_fungsional').hide();
            }

            $('#jabatan').change(function () {
                var selected = $('#jabatan').val()
                if(selected === '2') {
                    $('#jabatan_struktural').show();
                    $('#jabatan_fungsional').hide();
                }
                else if (selected === '') {
                    $('#jabatan_fungsional').hide();
                    $('#jabatan_struktural').hide();
                }
                else {
                    $('#jabatan_struktural').hide();
                    $('#jabatan_fungsional').show();
                }
            })
        }

         if($('#id_pangkat').length > 0) {
            var selected = $('#id_pangkat').val()
            if(selected === '') {
                $('#jabatan_non_pns').hide()
                $('#cpns').hide();
            }

            if(selected === '1') {
                $('#jabatan_non_pns').hide()
                $('#cpns').show();
            }

            if(selected === '2') {
                $('#jabatan_non_pns').show()
                $('#cpns').hide();
            }

            $('#id_pangkat').change(function () {
                var selected = $('#id_pangkat').val()
                if(selected === '2') {
                    $('#jabatan_non_pns').show()
                    $('#cpns').hide();
                }
                else if(selected === '') {
                    $('#jabatan_non_pns').hide()
                    $('#cpns').hide();
                }
                else {
                    $('#jabatan_non_pns').hide()
                    $('#cpns').show();
                }
            })
        }
        if($('#status').length > 0) {
        	var selected = $('#status').val()
        	if(selected === 'Aktif') {
        		$('#tanggal_keluar').hide()
        	}

        	$('#status').change(function () {
        		var selected = $('#status').val()
        		if(selected === 'Tidak Aktif') {
        			$('#tanggal_keluar').show()
        		}
        		else {
        			$('#tanggal_keluar').hide()
        		}
        	})
        }
    })
</script>

<script>
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