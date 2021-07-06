@extends('layouts/user/template')
@section('title', 'Data Pemeriksaan')
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">DataTable with default features</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No.</th>
          <th>No. Pendaftaran</th>
          <th>No. ID</th>
          <th>Nama Pasien</th>
          <th>Alamat</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        @foreach($periksa as $data)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$data->id_daftar}}</td>
          <td>{{$data->no_id}}</td>
          <td>{{$data->nama}}</td>
          <td>{{$data->alamat}}</td>
          <td>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit{{$data->id_periksa}}"><i class="fas fa-edit"></i></button>
            <a href="/periksa/edit/{{$data->id_periksa}}" class="btn btn-sm btn-success">Proses</a>
            <!-- <a href="" class="btn btn-sm btn-danger">hapus</a> -->
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
@foreach($periksa as $data)
<div class="modal fade" id="edit{{$data->id_periksa}}">
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
          <input type="text" name="id_periksa" class="form-control" value="{{$data->id_periksa}}" hidden>

          <div class="form-group row">
            <label for="inputnama" class="col-sm-3 col-form-label">No Pendaftaran</label>
            <div class="col-sm-9">
              <input type="text" value="{{$data->id_daftar}}" name="id_daftar" class="form-control" id="inputnama" placeholder=" Tindakan ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputjenis" class="col-sm-3 col-form-label">Nama Pasien</label>
            <div class="col-sm-9">
              <input type="text" value="{{$data->nama}}" name="nama" class="form-control" id="inputkode" placeholder="Tarif ..." required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Tindakan</label>
            <div class="col-sm-9">
              <select name="id_tindakan" class="form-control select2" style="width: 100%;">
                @foreach($tindakan as $data)
                <option value="{{$data->id_tindakan}}">{{$data->tindakan}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Keterangan</label>
            <div class="col-sm-9">
              <textarea name="keterangan" required class="form-control" rows="3" placeholder="Enter ..."></textarea>
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
@endsection