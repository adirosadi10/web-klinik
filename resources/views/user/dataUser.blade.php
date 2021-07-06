@extends('layouts/user/template')
@section('title', 'Data User')
@section('content')
<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-6">
        <form class="d-flex" action="" method="GET">
          <input type="search" value="{{$request->cari}}" name="cari" class="form-control mr-2" placeholder="Cari obat....">
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
          <th>Username</th>
          <th>Email</th>
          <th>Level</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        @foreach($user as $data)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$data->name}}</td>
          <td>{{$data->email}}</td>
          <?php if ($data->level == 0) {
            echo " <td>ADMIN</td>";
          } else {
            echo "  <td>MEMBER</td>";
          } ?>
          <td>

            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit{{$data->id}}"><i class="fas fa-edit"></i></button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$data->id}}"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
@include('user/tambah')
@include('user/update')
@include('user/delete')


@endsection