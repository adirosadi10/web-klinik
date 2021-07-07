@extends('layouts/user/template')
@section('title', 'Pendaftaran')
@section('content')
<div class="card">
  <div class="card-header">
    <div class="row justify-content-end">
      <button type="button" class="btn btn-primary end" data-toggle="modal" data-target="#modal-default">
        Tambah
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
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Data Pasien</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('tambahData')}}">
          @method('POST')
          @csrf
          <div class="form-group row">
            <label for="inputkode" class="col-sm-3 col-form-label">No KTP</label>
            <div class="col-sm-9">
              <input type="text" name="no_id" class="form-control" id="inputkode" placeholder="No KTP ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputnama" class="col-sm-3 col-form-label">Nama Pasien</label>
            <div class="col-sm-9">
              <input type="text" name="nama" class="form-control" id="inputnama" placeholder="Nama Pasien ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputjenis" class="col-sm-3 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-9">
              <select name="jk" class="form-control">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputstok" class="col-sm-3 col-form-label">Tempat lahir</label>
            <div class="col-sm-9">
              <input type="text" name="tmp_lahir" class="form-control" id="inputstok" placeholder="Tempat lahir ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="input" class="col-sm-3 col-form-label">Tanggal lahir</label>
            <div class="input-group date col-sm-9">
              <input type="date" name="tgl_lahir" required id="input" class="form-control " />
            </div>
          </div>
          <div class="form-group row">
            <label for="inputalamat" class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-9">
              <textarea type="text" name="alamat" class="form-control" id="inputalamat" placeholder="Alamat ..." required>
              </textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputhp" class="col-sm-3 col-form-label">No HP</label>
            <div class="col-sm-9">
              <input type="text" name="no_hp" class="form-control" id="inputhp" placeholder="Nomer HP ..." required>
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
@foreach($pendaftaran as $data)
<div class="modal fade" id="edit{{$data->id_daftar}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Proses Pendaftaran</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('updateDaftar','id')}}">
          @method('POST')
          @csrf
          <p>Pendaftaran akan di proses ?</p>
          <input name="id_daftar" value="{{$data->id_daftar}}" hidden>
          <input name="tgl_daftar" value="{{$data->tgl_daftar}}" hidden>
          <input name="no_id" value="{{$data->no_id}}" hidden>
          <input value="{{$data->nama}}" name="nama" hidden>
          <input value="{{$data->jk}}" name="jk" hidden>
          <input value="{{$data->tmp_lahir}}" name="tmp_lahir" hidden>
          <input value="{{$data->tgl_lahir}}" name="tgl_lahir" hidden />
          <input value="{{$data->alamat}}" name="alamat" hidden />
          <input value="{{$data->no_hp}}" name="no_hp" hidden>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Proses</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
@foreach($pendaftaran as $data)
<div class="modal fade" id="delete{{$data->id_daftar}}">
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
        <a href="pegawai/delete/{{$data->id_daftar}}" class="btn btn-danger">Hapus</a>
      </div>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
@endsection