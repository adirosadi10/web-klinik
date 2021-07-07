@extends('layouts/user/template')
@section('title', 'Tindakan')
@section('content')
<div class="card">
  <div class="card-header">
    <div class="row justify-content-between">
      <div class="col-6">
        <form class=" d-flex" action="" method="GET">
          <input type="search" value="{{$request->cari}}" name="cari" class="form-control mr-2" placeholder="Cari tindakan....">
          <button type="submit" class="btn btn-primary">
            cari
          </button>
        </form>
      </div>
      <div class="col-6">
        <button type="button" class="btn btn-primary justify-content-end" data-toggle="modal" data-target="#modal-default">
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
          <th>Tindakan</th>
          <th>Tarif</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        @foreach($tindakan as $data)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$data->tindakan}}</td>
          <td>{{$data->tarif}}</td>
          <td>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit{{$data->id_tindakan}}"><i class="fas fa-edit"></i></button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$data->id_tindakan}}"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@include('tindakan/tambah')
@include('tindakan/update')
@include('tindakan/delete')
@endsection