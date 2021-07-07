@extends('layouts/user/template')
@section('title', 'Pendaftaran')
@section('content')
<div class="card">
  <div class="card-header">
    <div class="row justify-content-end">
      <button type="button" class="btn btn-primary end" data-toggle="modal" data-target="#modal-default">
        Pendaftaran Baru
      </button>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    @if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      {{session('pesan')}}
    </div>
    @endif
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No.</th>
          <th>Tgl Daftar</th>
          <th>No. KTP</th>
          <th>Nama Pasien</th>
          <th>Gender</th>
          <th>TTL</th>
          <th>Alamat</th>
          <th>No HP</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1; ?>
        @foreach($pendaftaran as $data)
        <tr>
          <td>{{$no++}}</td>
          <td>{{ date('d-m-Y', strtotime($data->tgl_daftar))}}</td>
          <td>{{$data->no_id}}</td>
          <td>{{$data->nama}}</td>
          <td>{{$data->jk}}</td>
          <td>{{$data->tmp_lahir .', '. date('d-m-Y', strtotime($data->tgl_lahir))}}</td>
          <td>{{$data->alamat}}</td>
          <td>{{$data->no_hp}}</td>
          <td>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$data->id_daftar}}"><i class="fas fa-trash"></i></button>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{$data->id_daftar}}">Proses <i class="fas fa-arrow-right"></i></button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
@include('pendaftaran/tambah')
@include('pendaftaran/update')
@include('pendaftaran/delete')
@endsection