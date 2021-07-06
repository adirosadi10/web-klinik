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
  <!-- /.card-body -->
</div>
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Data tindakan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('tambahData')}}">
          @method('POST')
          @csrf
          <div class="form-group row">
            <label for="inputnama" class="col-sm-3 col-form-label">Tindakan</label>
            <div class="col-sm-9">
              <input type="text" name="tindakan" class="form-control" id="inputnama" placeholder="Tindakan ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputjenis" class="col-sm-3 col-form-label">Tarif</label>
            <div class="col-sm-9">
              <input type="number" name="tarif" class="form-control" id="inputkode" placeholder="Tarif ..." required>
            </div>
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@foreach($tindakan as $data)
<div class="modal fade" id="edit{{$data->id_tindakan}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Data tindakan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('updateData','id')}}">
          @method('POST')
          @csrf
          <input type="text" name="id_tindakan" class="form-control" value="{{$data->id_tindakan}}" hidden>

          <div class="form-group row">
            <label for="inputnama" class="col-sm-3 col-form-label">Tindakan</label>
            <div class="col-sm-9">
              <input type="text" value="{{$data->tindakan}}" name="tindakan" class="form-control" id="inputnama" placeholder=" Tindakan ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputjenis" class="col-sm-3 col-form-label">Tarif</label>
            <div class="col-sm-9">
              <input type="number" value="{{$data->tarif}}" name="tarif" class="form-control" id="inputkode" placeholder="Tarif ..." required>
            </div>
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
@foreach($tindakan as $data)
<div class="modal fade" id="delete{{$data->id_tindakan}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Data {{$data->tindakan}}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <p>Apakah yakin akan menghapus data ?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="tindakan/delete/{{$data->id_tindakan}}" class="btn btn-danger">Hapus</a>
      </div>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
@endsection