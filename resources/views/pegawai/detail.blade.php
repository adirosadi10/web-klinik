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
        <input value="{{$data->id_pegawai}}" hidden>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Kode pegawai</label>
          <div class="col-sm-9">
            <input class="form-control" value="{{$data->no_pegawai}}" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Nama pegawai</label>
          <div class="col-sm-9">
            <input value="{{$data->nama_pegawai}}" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
          <div class="col-sm-9">
            <input class="form-control" value="{{$data->jk}}" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Jabatan</label>
          <div class="col-sm-9">
            <input value="{{$data->jabatan}}" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputstok" class="col-sm-3 col-form-label">Poli</label>
          <div class="col-sm-9">
            <input value="{{$data->poli}}" readonly class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Alamat</label>
          <div class="col-sm-9">
            <textarea class="form-control" readonly>{{$data->alamat}}
            </textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputharga" class="col-sm-3 col-form-label">No HP</label>
          <div class="col-sm-9">
            <input value="{{$data->no_hp}}" class="form-control" readonly>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-end">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endforeach