@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">

            <h5>Jumlah pegawai berdasarkan bidang</h5>

            <canvas id="departemen"></canvas>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="card-box table-responsive">
            <table id="datatable" class=" table table-condensed table-bordered">
                <thead>
					<tr>
						<th></th>
                        <th>Laki-laki</th>
						<th>Perempuan</th>
					</tr>
				</thead>
				<tbody>
					@foreach($list as $row)
						<tr>
							<th style="text-align: right;">{{ $row->nama }}</th>
							<td>{{ $row->total_laki }}</td>
							<td>{{ $row->total_pr }}</td>
						</tr>
					@endforeach
                </tbody>
            </table>
            <p style="text-align:right;"><i class="label label-info">Total : {{ $total }} pegawai</i>
            </p>
        </div>
    </div><!-- end col -->
    <div class="col-sm-8">
        <div class="card-box">
            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection

@push('scripts')
<script type="text/javascript">
    Highcharts.chart('container', {
        data: {
            table: 'datatable'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'Laporan detail statistik pegawai sesuai bidang'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Units'
            }
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ' + this.point.name.toLowerCase();
            }
        }
    }); 
</script>
@endpush