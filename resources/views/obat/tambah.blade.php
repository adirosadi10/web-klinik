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
        <form method="POST" action="{{route('tambahDataObat')}}">
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
  </div>
</div>