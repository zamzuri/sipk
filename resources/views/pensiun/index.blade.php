@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-4">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">Atur pensiun pegawai {{date('Y')}}</h4>
            {{ Form::open(array('route' => 'pensiun.store')) }}
            {{ Form::select('pegawai_id[]', App\Pegawai::lists('nama','id'), array_pluck(App\Pensiun::where('tahun_pensiun',date('Y'))->get(),'pegawai_id'), ['class' => 'multi-select','multiple','id'=>'my_multi_select4'])}}
            <br/>
            {{ Form::label('name', 'Tahun pensiun') }} : {{ Form::selectYear('tahun_pensiun',date('Y') ,date('Y'),['class'=>'year']) }}
            {{ Form::submit('Save' ,array('class'=>'send-btn btn btn-xs btn-success')) }}
            {{ Form::close()}}
        </div>
    </div><!-- end col -->
    <div class="col-sm-4">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">Atur pensiun pegawai {{date('Y')+1}}</h4>
            {{ Form::open(array('route' => 'pensiun.store')) }}
            {{ Form::select('pegawai_id[]', App\Pegawai::lists('nama','id'), array_pluck(App\Pensiun::where('tahun_pensiun',date('Y')+1)->get(),'pegawai_id'), ['class' => 'multi-select select-1','multiple','id'=>'my_multi_select4'])}}
            <br/>
            {{ Form::label('name', 'Tahun pensiun') }} : {{ Form::selectYear('tahun_pensiun-1', date('Y')+1, date('Y')+1,['class'=>'year-2']) }}
            {{ Form::submit('Save' ,array('class'=>'send-btn-1 btn btn-xs btn-success')) }}
            {{ Form::close()}}
        </div>
    </div><!-- end col -->
    <div class="col-sm-4">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">Atur pensiun pegawai {{date('Y')+2}}</h4>
            {{ Form::open(array('route' => 'pensiun.store')) }}
            {{ Form::select('pegawai_id[]', App\Pegawai::lists('nama','id'), array_pluck(App\Pensiun::where('tahun_pensiun',date('Y')+2)->get(),'pegawai_id'), ['class' => 'multi-select select-2','multiple','id'=>'my_multi_select4'])}}
            <br/>
            {{ Form::label('name', 'Tahun pensiun') }} : {{ Form::selectYear('tahun_pensiun-2', date('Y')+2, date('Y')+2,['class'=>'year-2']) }}
            {{ Form::submit('Save' ,array('class'=>'send-btn-2 btn btn-xs btn-success')) }}
            {{ Form::close()}}
        </div>
    </div><!-- end col -->
</div>
<!-- end row -->
@endsection
@push('scripts')
<script>
$(document).ready(function() {

    $('.multi-select').multiSelect({
        selectableHeader: "<label class='label label-default'>Daftar pegawai</label>",
        selectionHeader: "<label class='label label-primary'>Pegawai yang pensiun</label>"
    });
});
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.send-btn').click(function(e){   
            e.preventDefault();
            $.ajax({
                url: "{{route('pensiun.store')}}",
                type: "post",
                data: {'pegawai_id': $('.multi-select').val(), '_token': $('input[name=_token]').val(), 'tahun_pensiun': $('select[name=tahun_pensiun]').val()},
                success: function(data){
                    
                }
            });      
        });

        $('.send-btn-1').click(function(e){   
            e.preventDefault();
            $.ajax({
                url: "{{route('pensiun.store')}}",
                type: "post",
                data: {'pegawai_id': $('.select-1').val(), '_token': $('input[name=_token]').val(), 'tahun_pensiun': $('select[name=tahun_pensiun-1]').val()},
                success: function(data){
                    
                }
            });      
        });

        $('.send-btn-2').click(function(e){   
            e.preventDefault();
            $.ajax({
                url: "{{route('pensiun.store')}}",
                type: "post",
                data: {'pegawai_id': $('.select-2').val(), '_token': $('input[name=_token]').val(), 'tahun_pensiun': $('select[name=tahun_pensiun-2]').val()},
                success: function(data){
                    
                }
            });      
        }); 
    });
</script>
@endpush
