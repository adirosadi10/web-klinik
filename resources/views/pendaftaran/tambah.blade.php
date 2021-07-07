<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Masukan Data Pasien</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('tambahDataPendaftaran')}}">
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
              <input type="number" name="no_hp" class="form-control" id="inputhp" placeholder="Nomer HP ..." required>
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