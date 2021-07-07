@extends('layouts/user/template')
@section('title', 'Data Pegawai')
@section('content')
<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-6">
        <form class="d-flex" action="" method="GET">
          <input type="search" value="{{$request->cari}}" name="cari" class="form-control mr-2" placeholder="Cari pegawai....">
          <button type="submit" class="btn btn-primary">
            cari
          </button>
        </form>
      </div>
      <div class="col-6">
        <button type="button" class="btn btn-primary end" data-toggle="modal" data-target="#modal-default">
          Tambah
        </button>
      </div>
    </div>
  </div>
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
          <th>ID Pegawai</th>
          <th>Nama Pegawai</th>
          <th>Jabatan</th>
          <th>Poli</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        @foreach($pegawai as $data)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$data->no_pegawai}}</td>
          <td>{{$data->nama_pegawai}}</td>
          <td>{{$data->jabatan}}</td>
          <td>{{$data->poli}}</td>
          <td>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#detail{{$data->id_pegawai}}"><i class="fas fa-edit"></i></button>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit{{$data->id_pegawai}}"><i class="fas fa-edit"></i></button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$data->id_pegawai}}"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@include('pegawai/tambah')
@include('pegawai/update')
@include('pegawai/delete')
@include('pegawai/detail')
@endsection