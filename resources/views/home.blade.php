@extends('layouts.app')
@section('content')
<div class="card-box">
    <h5>Realtime statistik jumlah pegawai</h5>
    <div class="row">
        <div class="col-sm-4 col-lg-4 text-center">
            <div class="p-20">
                <div data-plugin="circliful" class="circliful-chart m-b-30" data-dimension="180"
                     data-text="{{ $data['total_pegawai'] }}" data-info="Total pegawai" data-width="20" data-fontsize="24"
                     data-percent="{{ $data['total_pegawai'] }}" data-fgcolor="#57c5a5" data-bgcolor="#eeeeee"
                     data-fill="#f1f1f1"></div>
            </div>
        </div><!-- end col-->
        <div class="col-sm-4 col-lg-4 text-center">
            <div class="p-20">
                <div data-plugin="circliful" class="circliful-chart m-b-30" data-dimension="180"
                     data-text="{{ $data['jml_laki']->total_laki }}" data-info="Pegawai Laki-laki" data-width="20" data-fontsize="24"
                     data-percent="{{ $data['jml_laki']->total_laki }}" data-fgcolor="#57c5a5" data-bgcolor="#eeeeee"
                     data-fill="#f1f1f1"></div>
            </div>
        </div><!-- end col-->
        <div class="col-sm-4 col-lg-4 text-center">
            <div class="p-20">
                <div data-plugin="circliful" class="circliful-chart m-b-30" data-dimension="180"
                     data-text="{{ $data['jml_pr']->total_pr }}" data-info="Pegawai Perempuan" data-width="20" data-fontsize="24"
                     data-percent="{{ $data['jml_pr']->total_pr }}" data-fgcolor="#57c5a5" data-bgcolor="#eeeeee"
                     data-fill="#f1f1f1"></div>
            </div>
        </div><!-- end col-->
    </div><!-- end row-->
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card-box">

            <h5>Jumlah pegawai berdasarkan golongan</h5>

            <canvas id="golongan"></canvas>

        </div>
    </div>

    <div class="col-lg-6">
        <div class="card-box">

            <h5>Jumlah pegawai berdasarkan pendidikan</h5>

            <canvas id="pendidikan"></canvas>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="card-box">

            <h5>Jumlah pegawai berdasarkan fungsional</h5>

            <canvas id="fungsional"></canvas>

        </div>
    </div>

    <div class="col-lg-6">
        <div class="card-box">

            <h5>Jumlah pegawai berdasarkan pangkat</h5>

            <canvas id="pangkat"></canvas>

        </div>
    </div>

</div>
<!-- end row -->
<div class="row">
    <div class="col-lg-3">
        <div class="card-box">

            <h6>Daftar pegawai yang akan pensiun {{ date('Y') }}</h6>

            <div class="inbox-widget nicescroll" style="height: 315px;">
                <?php
                    $p=App\Pensiun::where('tahun_pensiun',date('Y'))->get();
                    foreach ($p as $value) {
                ?>
                <a href="#">
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="{{ asset('img/'.$value->pegawai->photo) }}" class="img-circle" alt=""></div>
                        <p class="inbox-item-author">{{ $value->pegawai->nama }}</p>
                        <p class="inbox-item-text">{{ $value->pegawai->bidang->nama}}</p>
                    </div>
                </a>
                <?php
                }
                ?>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-lg-3">
        <div class="card-box">

            <h6>Daftar pegawai yang akan pensiun {{ date('Y')+1 }}</h6>

            <div class="inbox-widget nicescroll" style="height: 315px;">
                <?php
                    $p=App\Pensiun::where('tahun_pensiun',date('Y')+1)->get();
                    foreach ($p as $value) {
                ?>
                <a href="#">
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="{{ asset('img/'.$value->pegawai->photo) }}" class="img-circle" alt=""></div>
                        <p class="inbox-item-author">{{ $value->pegawai->nama }}</p>
                        <p class="inbox-item-text">{{ $value->pegawai->bidang->nama}}</p>
                    </div>
                </a>
                <?php
                }
                ?>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-lg-3">
        <div class="card-box">

            <h6>Daftar pegawai yang akan pensiun {{ date('Y')+2 }}</h6>

            <div class="inbox-widget nicescroll" style="height: 315px;">
                <?php
                    $p=App\Pensiun::where('tahun_pensiun',date('Y')+2)->get();
                    foreach ($p as $value) {
                ?>
                <a href="#">
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="{{ asset('img/'.$value->pegawai->photo) }}" class="img-circle" alt=""></div>
                        <p class="inbox-item-author">{{ $value->pegawai->nama }}</p>
                        <p class="inbox-item-text">{{ $value->pegawai->bidang->nama}}</p>
                    </div>
                </a>
                <?php
                }
                ?>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-lg-3">
        <div class="card-box">

            <h6>Daftar pegawai yang tugas belajar {{ Form::selectYear('year', date('Y')+2, '1990',date('Y')) }}</h6>

            <div class="inbox-widget nicescroll" style="height: 315px;" id='tugasbelajar'>
                
            </div>
        </div>
    </div><!-- end col -->

</div>
<!-- end row -->
@endsection
@push('scripts')
<script>
$(document).ready(function() {
    $('select[name=year]').on('change', function() {
        var optionSelected = $(this).find("option:selected");
        year  = optionSelected.val();
        // Get the data and display them!
       $.getJSON("{{ url('tugasbelajar/list') }}"+"/"+year,
             function (data) {
                var output = '';

                if (data.error !== 0)
                   output = '<i>There are no data...</i>';

                $.each(data.pegawai, function (index, elem) {
                    // Build up the string of HTML to display information
                    output +="<div class=\"inbox-item\">" +
                             "   <div class=\"inbox-item-img\">" +
                             "       <img src=\"img/" + elem.file +"\" class=\"img-circle\">" +
                             "   </div>" + 
                             "   <p class=\"inbox-item-author\">" + elem.nama + "</p>" +
                             "   <p class=\"inbox-item-text\">" + elem.bidang + "</p>" +
                             "</div>";
                });

                $("#tugasbelajar").show().html(output);
            }
       );

    });
});  
</script>
@endpush
