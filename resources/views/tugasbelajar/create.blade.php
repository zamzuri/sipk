@extends('layouts.app')
@section('content')
<div class="row" id="box">
    <div class="col-sm-4">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">Atur tugas belajar pegawai</h4>
            {{ Form::open(array('route' => 'tugasbelajar.store')) }}
            {{ Form::select('pegawai_id[]', App\Pegawai::lists('nama','id'), array_pluck(App\TugasBelajar::where('tahun_belajar',date('Y'))->get(),'pegawai_id'), ['class' => 'multi-select','multiple','id'=>'my_multi_select4'])}}
            <br/>
            {{ Form::label('name', 'Tahun belajar') }} : {{ Form::selectYear('tahun_belajar',date('Y'),2010,['class'=>'year']) }}
            {{ Form::submit('Save' ,array('class'=>'send-btn btn btn-xs btn-success')) }}
            {{ Form::close()}}
        </div>
    </div><!-- end col -->
</div>
</div>
<!-- end row -->
@endsection
@push('scripts')
<script>
$(document).ready(function() {

    $('.multi-select').multiSelect({
        selectableHeader: "<label class='label label-default'>Daftar pegawai</label>",
        selectionHeader: "<label class='label label-primary'>Pegawai yang tugas belajar</label>"
    });

     $('.send-btn').click(function(e){   
        e.preventDefault();
        $.ajax({
            url: "{{route('tugasbelajar.store')}}",
            type: "post",
            data: {'pegawai_id': $('.multi-select').val(), '_token': $('input[name=_token]').val(), 'tahun_belajar': $('select[name=tahun_belajar]').val()},
            success: function(data){
                
            }
        });      
    });
    });
</script>

@endpush
