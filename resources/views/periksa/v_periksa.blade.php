@extends('layouts/user/template')
@section('title', 'Data Pemeriksaan')
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Pemeriksaan</h3>
  </div>
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No.</th>
          <th>No. Pendaftaran</th>
          <th>No. ID</th>
          <th>Nama Pasien</th>
          <th>Alamat</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        @foreach($periksa as $data)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$data->id_daftar}}</td>
          <td>{{$data->no_id}}</td>
          <td>{{$data->nama}}</td>
          <td>{{$data->alamat}}</td>
          <td>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{$data->id_periksa}}">Proses <i class="fas fa-arrow-right"></i></button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@include('periksa/update')
@endsection