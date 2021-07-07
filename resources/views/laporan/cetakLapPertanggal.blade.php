@extends('layouts/user/template')
@section('title', 'Laporan Bulanan')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <!-- Main content -->
      <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
          <div class="col-12">
            <h4>
              <i class="fas fa-hospital"></i> <b>Klinik Sehat</b>
              <small class="float-right">Tgl. Cetak : <?php $hari_ini = date('l, d-m-Y');
                                                      echo $hari_ini; ?></small>
            </h4>
          </div>
          <!-- /.col -->
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-12 text-center mb-4">
            <strong>LAPORAN HARIAN.</strong><br>
            <h4>Riwayat kunjungan tanggal : {{ date('d-m-Y', strtotime($tgl))}}</h4>
          </div>
        </div>
        <!-- Table row -->
        <div class="row">
          <div class="col-12 table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>No. ID</th>
                  <th>Nama Pasien</th>
                  <th>Gender</th>
                  <th>TTL</th>
                  <th>Alamat</th>
                  <th>No. HP</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1; ?>
                @foreach($cetakHarian as $data)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$data->no_id}}</td>
                  <td>{{$data->nama}}</td>
                  <td>{{$data->jk}}</td>
                  <td>{{$data->tmp_lahir .', '. date('d-m-Y', strtotime($data->tgl_lahir))}}</td>
                  <td>{{$data->alamat}}</td>
                  <td>{{$data->no_hp}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.col -->
        </div>

        <!-- this row will not appear when printing -->
        <div class="row no-print">
          <div class="col-12">
            <a href="" onclick="window.print();" target="_blank" class="btn btn-primary"><i class="fas fa-print"></i> Print</a>
          </div>
        </div>
      </div>
      <!-- /.invoice -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection