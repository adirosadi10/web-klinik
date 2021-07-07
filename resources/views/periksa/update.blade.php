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
        <form method="POST" action="{{route('updateDataPeriksa','id')}}">
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
  </div>
</div>
@endforeach