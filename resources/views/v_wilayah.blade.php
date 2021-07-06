@extends('layouts/user/template')
@section('title', 'Data Wilayah')
@section('content')
<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-6">
        <form class="d-flex" action="" method="GET">
          <input type="search" value="{{$request->cari}}" name="cari" class="form-control mr-2" placeholder="Cari wilayah....">
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
          <th>Provinsi</th>
          <th>Distrik</th>
          <th>Kecamatan</th>
          <th>Kelurahan</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        @foreach($wilayah as $data)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$data->provinsi}}</td>
          <td>{{$data->distrik}}</td>
          <td>{{$data->kecamatan}}</td>
          <td>{{$data->kelurahan}}</td>
          <td>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit{{$data->id_wilayah}}"><i class="fas fa-edit"></i></button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$data->id_wilayah}}"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
        @endforeach

      </tbody>
      <tfoot>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Data wilayah</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('tambahData')}}">
          @method('POST')
          @csrf
          <div class="form-group row">
            <label for="inputkode" class="col-sm-3 col-form-label">Provinsi</label>
            <div class="col-sm-9">
              <input type="text" name="provinsi" class="form-control" id="inputkode" placeholder="Provinsi ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputnama" class="col-sm-3 col-form-label">Distrik</label>
            <div class="col-sm-9">
              <input type="text" name="distrik" class="form-control" id="inputnama" placeholder="Distrik ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputjenis" class="col-sm-3 col-form-label">Kecamatan</label>
            <div class="col-sm-9">
              <input type="text" name="kecamatan" class="form-control" id="inputkode" placeholder="Kecamatan ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputstok" class="col-sm-3 col-form-label">Kelurahan</label>
            <div class="col-sm-9">
              <input type="text" name="kelurahan" class="form-control" id="inputstok" placeholder="Kelurahan ..." required>
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
@foreach($wilayah as $data)
<div class="modal fade" id="edit{{$data->id_wilayah}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Data wilayah</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('updateData','id')}}">
          @method('POST')
          @csrf
          <input type="text" name="id_wilayah" class="form-control" value="{{$data->id_wilayah}}" hidden>
          <div class="form-group row">
            <label for="inputkode" class="col-sm-3 col-form-label">Provinsi</label>
            <div class="col-sm-9">
              <input type="text" name="provinsi" class="form-control" id="inputkode" placeholder="Provinsi ..." value="{{$data->provinsi}}" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputnama" class="col-sm-3 col-form-label">Distrik</label>
            <div class="col-sm-9">
              <input type="text" value="{{$data->distrik}}" name="distrik" class="form-control" id="inputnama" placeholder="Distrik ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputjenis" class="col-sm-3 col-form-label">Kecamatan</label>
            <div class="col-sm-9">
              <input type="text" value="{{$data->kecamatan}}" name="kecamatan" class="form-control" id="inputkode" placeholder="Kecamatan ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputstok" class="col-sm-3 col-form-label">Kelurahan</label>
            <div class="col-sm-9">
              <input type="text" value="{{$data->kelurahan}}" name="kelurahan" class="form-control" id="inputstok" placeholder="Kelurahan ..." required>
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
@foreach($wilayah as $data)
<div class="modal fade" id="delete{{$data->id_wilayah}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <p>Apakah yakin akan menghapus data ?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="wilayah/delete/{{$data->id_wilayah}}" class="btn btn-danger">Hapus</a>
      </div>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
@endsection