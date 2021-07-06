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
  <!-- /.card-body -->
</div>
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Data Pegawai</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('tambahData')}}">
          @method('POST')
          @csrf
          <div class="form-group row">
            <label for="inputkode" class="col-sm-3 col-form-label">Kode Pegawai</label>
            <div class="col-sm-9">
              <input type="text" name="no_pegawai" class="form-control" id="inputkode" placeholder="Kode Pegawai ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputnama" class="col-sm-3 col-form-label">Nama Pegawai</label>
            <div class="col-sm-9">
              <input type="text" name="nama_pegawai" class="form-control" id="inputnama" placeholder="Nama pegawai ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputjenis" class="col-sm-3 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-9">
              <select name="jk" class="form-control">
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputstok" class="col-sm-3 col-form-label">Jabatan</label>
            <div class="col-sm-9">
              <input type="text" name="jabatan" class="form-control" id="inputstok" placeholder="Jabatan ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputharga" class="col-sm-3 col-form-label">Poli</label>
            <div class="col-sm-9">
              <input type="text" name="poli" class="form-control" id="inputharga" placeholder="Poli ..." required>
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

@foreach($pegawai as $data)
<div class="modal fade" id="detail{{$data->id_pegawai}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Data Pegawai</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="" action="">


          <input type="text" name="id_pegawai" class="form-control" id="inputkode" placeholder="Kode pegawai ..." required value="{{$data->id_pegawai}}" hidden>
          <div class="form-group row">
            <label for="inputkode" class="col-sm-3 col-form-label">Kode pegawai</label>
            <div class="col-sm-9">
              <input type="text" name="no_pegawai" class="form-control" id="inputkode" placeholder="Kode pegawai ..." value="{{$data->no_pegawai}}" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputnama" class="col-sm-3 col-form-label">Nama pegawai</label>
            <div class="col-sm-9">
              <input type="text" value="{{$data->nama_pegawai}}" name="nama_pegawai" class="form-control" id="inputnama" placeholder="Nama pegawai ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputjenis" class="col-sm-3 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-9">
              <select name="jk" class="form-control">
                <option value="{{$data->jk}}" selected>{{$data->jk}}</option>

              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputjenis" class="col-sm-3 col-form-label">Jabatan</label>
            <div class="col-sm-9">
              <input type="text" value="{{$data->jabatan}}" name="jabatan" class="form-control" id="inputkode" placeholder="jabatan ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputstok" class="col-sm-3 col-form-label">Poli</label>
            <div class="col-sm-9">
              <input type="text" value="{{$data->poli}}" name="poli" class="form-control" id="inputstok" placeholder="Poli ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputalamat" class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-9">
              <textarea type="text" name="alamat" class="form-control" id="inputalamat" placeholder="Alamat ..." required>{{$data->alamat}}
              </textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputharga" class="col-sm-3 col-form-label">No HP</label>
            <div class="col-sm-9">
              <input type="number" value="{{$data->no_hp}}" name="no_hp" class="form-control" id="inputharga" placeholder="No HP ..." required>
            </div>
          </div>
      </div>
      <div class="modal-footer justify-content-end">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
@foreach($pegawai as $data)
<div class="modal fade" id="edit{{$data->id_pegawai}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Data Pegawai</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('updateData','id')}}">
          @method('POST')
          @csrf
          <input type="text" name="id_pegawai" class="form-control" id="inputkode" placeholder="Kode pegawai ..." required value="{{$data->id_pegawai}}" hidden>
          <div class="form-group row">
            <label for="inputkode" class="col-sm-3 col-form-label">Kode pegawai</label>
            <div class="col-sm-9">
              <input type="text" name="no_pegawai" class="form-control" id="inputkode" placeholder="Kode pegawai ..." value="{{$data->no_pegawai}}" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputnama" class="col-sm-3 col-form-label">Nama pegawai</label>
            <div class="col-sm-9">
              <input type="text" value="{{$data->nama_pegawai}}" name="nama_pegawai" class="form-control" id="inputnama" placeholder="Nama pegawai ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputjenis" class="col-sm-3 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-9">
              <select name="jk" class="form-control">
                <option value="{{$data->jk}}" selected>{{$data->jk}}</option>
                <?php if ($data->jk == "Laki-laki") {
                  echo " <option value='Perempuan'>Perempuan</option>";
                } else {
                  echo "  <option value='Laki-laki'>Laki-laki</option>";
                } ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputjenis" class="col-sm-3 col-form-label">Jabatan</label>
            <div class="col-sm-9">
              <input type="text" value="{{$data->jabatan}}" name="jabatan" class="form-control" id="inputkode" placeholder="jabatan ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputstok" class="col-sm-3 col-form-label">Poli</label>
            <div class="col-sm-9">
              <input type="text" value="{{$data->poli}}" name="poli" class="form-control" id="inputstok" placeholder="Poli ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputalamat" class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-9">
              <textarea type="text" name="alamat" class="form-control" id="inputalamat" placeholder="Alamat ..." required>{{$data->alamat}}
              </textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputharga" class="col-sm-3 col-form-label">No HP</label>
            <div class="col-sm-9">
              <input type="number" value="{{$data->no_hp}}" name="no_hp" class="form-control" id="inputharga" placeholder="No HP ..." required>
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
@foreach($pegawai as $data)
<div class="modal fade" id="delete{{$data->id_pegawai}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Data {{$data->nama_pegawai}}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <p>Apakah yakin akan menghapus data ?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="pegawai/delete/{{$data->id_pegawai}}" class="btn btn-danger">Hapus</a>
      </div>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
@endsection