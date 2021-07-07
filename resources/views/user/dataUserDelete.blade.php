@extends('layouts/user/template')
@section('title', 'Data User')
@section('content')
<div class="card">
  <div class="card-header">
    <h4>Delete Data User</h4>
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
        @foreach($userDelete as $data)
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

            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$data->id}}"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
@include('user/delete')


@endsection