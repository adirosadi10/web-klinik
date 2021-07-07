@extends('layouts/user/template')
@section('title', 'Laporan Bulanan')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <figure class="highcharts-figure">
        <div id="chartPendapatan"></div>
      </figure>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <figure class="highcharts-figure">
        <div id="chartKunjungan"></div>
      </figure>
    </div>
  </div>
</div>
@endsection

@section('script')
@include('laporan/script')
<script>
  Highcharts.chart('chartPendapatan', {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Laporan Pendapatan'
    },
    subtitle: {
      text: 'Source: Klinik Sehat'
    },
    xAxis: {
      categories: [
        <?php
        foreach ($cetakBulan as $key => $value) {
          echo " '$value->tanggal', ";
        }
        ?>
      ],
      crosshair: true
    },
    yAxis: {
      min: 0,
      title: {
        text: 'Total (Rp.)'
      }
    },
    tooltip: {
      headerFormat: '<span style="font-size:10px">{series.name}</span><table>',
      pointFormat: '<tr><td style="color:{series.color};padding:0">{point.key}: </td>' +
        '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
      footerFormat: '</table>',
      shared: true,
      useHTML: true
    },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0
      }
    },
    series: [{
      name: 'Periode',
      data: [
        <?php
        foreach ($cetakBulan as $key => $value) {
          echo " $value->total_sales, ";
        }
        ?>
      ]

    }]
  });
</script>
<script>
  Highcharts.chart('chartKunjungan', {
    chart: {
      type: 'line'
    },
    title: {
      text: 'Laporan Kunjungan Pasien'
    },
    subtitle: {
      text: 'Source: Klinik Sehat'
    },
    xAxis: {
      categories: [
        <?php
        foreach ($kunjungan as $key => $value) {
          echo " '$value->tgl_daftar', ";
        }
        ?>
        // 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
      ]
    },
    yAxis: {
      title: {
        text: 'Kunjungan'
      }
    },
    plotOptions: {
      line: {
        dataLabels: {
          enabled: true
        },
        enableMouseTracking: false
      }
    },
    series: [{
      name: 'Periode',
      data: [
        <?php
        foreach ($kunjungan as $key => $value) {
          echo " $value->kunjungan, ";
        }
        ?>
        // 7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6
      ]
    }]
  });
</script>
@endsection