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
        <form method="POST" action="{{route('tambahDataPegawai')}}">
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
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
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
              <input type="number" name="no_hp" class="form-control" id="inputhp" placeholder="Nomer HP ..." required>
            </div>
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>