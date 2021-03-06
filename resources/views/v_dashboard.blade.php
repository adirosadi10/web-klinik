@extends('layouts/user/template')
@section('title', 'Dashboard')
@section('content')
<div class="row">
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-dollar-sign"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Pemasukan Hari ini</span>
        <span class="info-box-number">
          @foreach($pemasukan as $data)
          <?php
          echo "Rp " . number_format($data->total, 0, ',', '.');
          ?>
          @endforeach
        </span>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <a href="{{route('Transaksi')}}"></a>
      <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-bell"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Transaksi tertunda</span>
        <span class="info-box-number">
          @foreach($pembayaran as $data)
          {{$data->pembayaran}}
          @endforeach
        </span>
      </div>
    </div>
  </div>
  <div class="clearfix hidden-md-up"></div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Total Pasien Hari ini</span>
        <span class="info-box-number">@foreach($kunjungan as $data)
          {{$data->kunjungan}}
          @endforeach</span>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Daftar Tunggu</span>
        <span class="info-box-number">@foreach($daftar as $data)
          {{$data->daftar}}
          @endforeach</span></span>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
@include('laporan/script')
@endsection