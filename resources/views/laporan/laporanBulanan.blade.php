@extends('layouts/user/template')
@section('title', 'Laporan Bulanan')
@section('content')
<div class="card card-primary card-outline">
  <div class="card-header">
    <h3 class="card-title">
      <i class="far fa-chart-bar"></i>
      Bar Chart
    </h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <div id="bar-chart" style="height: 300px;"></div>
  </div>

  @endsection

  @section('script')
  <script src="{{asset('template')}}/plugins/flot/jquery.flot.js"></script>

  <script>
    $(function() {


      var bar_data = {
        data: [
          [1, 10],
          [2, 8],
          [3, 4],
          [4, 13],
          [5, 17],
          [6, 9]
        ],
        bars: {
          show: true
        }
      }
      $.plot('#bar-chart', [bar_data], {
        grid: {
          borderWidth: 1,
          borderColor: '#f3f3f3',
          tickColor: '#f3f3f3'
        },
        series: {
          bars: {
            show: true,
            barWidth: 0.5,
            align: 'center',
          },
        },
        colors: ['#3c8dbc'],
        xaxis: {
          ticks: [
            [1, 'January'],
            [2, 'February'],
            [3, 'March'],
            [4, 'April'],
            [5, 'May'],
            [6, 'June']
          ]
        }
      });
    });
  </script>
  @endsection