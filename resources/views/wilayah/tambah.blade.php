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
        <form method="POST" action="{{route('tambahDataWilayah')}}">
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
  </div>
</div>