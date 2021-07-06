@extends('layouts/user/template')
@section('title', 'Data Obat')
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
          <th>Kode Obat</th>
          <th>Nama Obat</th>
          <th>Jenis</th>
          <th>Harga</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        @foreach($obat as $data)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$data->no_obat}}</td>
          <td>{{$data->nama_obat}}</td>
          <td>{{$data->jenis}}</td>
          <td>{{$data->harga}}</td>
          <td>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit{{$data->id_obat}}"><i class="fas fa-edit"></i></button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$data->id_obat}}"><i class="fas fa-trash"></i></button>
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
        <h4 class="modal-title">Data Obat</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('tambahData')}}">
          @method('POST')
          @csrf
          <div class="form-group row">
            <label for="inputkode" class="col-sm-3 col-form-label">Kode Obat</label>
            <div class="col-sm-9">
              <input type="text" name="no_obat" class="form-control" id="inputkode" placeholder="Kode Obat ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputnama" class="col-sm-3 col-form-label">Nama Obat</label>
            <div class="col-sm-9">
              <input type="text" name="nama_obat" class="form-control" id="inputnama" placeholder="Nama Obat ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputjenis" class="col-sm-3 col-form-label">Jenis</label>
            <div class="col-sm-9">
              <input type="text" name="jenis" class="form-control" id="inputkode" placeholder="Jenis ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputharga" class="col-sm-3 col-form-label">Harga Obat</label>
            <div class="col-sm-9">
              <input type="number" name="harga" class="form-control" id="inputharga" placeholder="Harga ..." required>
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

@foreach($obat as $data)
<div class="modal fade" id="edit{{$data->id_obat}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Data Obat</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('updateData','id')}}">
          @method('POST')
          @csrf
          <input type="text" name="id_obat" class="form-control" id="inputkode" placeholder="Kode Obat ..." required value="{{$data->id_obat}}" hidden>
          <div class="form-group row">
            <label for="inputkode" class="col-sm-3 col-form-label">Kode Obat</label>
            <div class="col-sm-9">
              <input type="text" name="no_obat" class="form-control" id="inputkode" placeholder="Kode Obat ..." value="{{$data->no_obat}}" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputnama" class="col-sm-3 col-form-label">Nama Obat</label>
            <div class="col-sm-9">
              <input type="text" value="{{$data->nama_obat}}" name="nama_obat" class="form-control" id="inputnama" placeholder="Nama Obat ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputjenis" class="col-sm-3 col-form-label">Jenis</label>
            <div class="col-sm-9">
              <input type="text" value="{{$data->jenis}}" name="jenis" class="form-control" id="inputkode" placeholder="Jenis ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputharga" class="col-sm-3 col-form-label">Harga Obat</label>
            <div class="col-sm-9">
              <input type="number" value="{{$data->harga}}" name="harga" class="form-control" id="inputharga" placeholder="Harga ..." required>
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
@foreach($obat as $data)
<div class="modal fade" id="delete{{$data->id_obat}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Data {{$data->nama_obat}}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <p>Apakah yakin akan menghapus data ?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="obat/delete/{{$data->id_obat}}" class="btn btn-danger">Hapus</a>
      </div>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach

@endsection