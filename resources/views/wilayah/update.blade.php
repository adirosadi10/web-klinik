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
        <form method="POST" action="{{route('updateDataWilayah','id')}}">
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
  </div>
</div>
@endforeach