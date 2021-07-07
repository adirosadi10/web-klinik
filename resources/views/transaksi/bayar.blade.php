@foreach($tunggu as $data)
<div class="modal fade" id="edit{{$data->id_transaksi}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Pembayaran</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('bayarTransaksi','id')}}">
          @method('POST')
          @csrf
          <input type="text" name="id_transaksi" value="{{$data->id_transaksi}}" hidden>
          <input type="text" name="id_periksa" value="{{$data->id_periksa}}" hidden>
          <div class="form-group row">
            <label for="inputkode" class="col-sm-3 col-form-label">Total Bayar</label>
            <div class="col-sm-9">
              <input type="text" readonly name="total" class="form-control" id="total" placeholder="Total Bayar ..." value="{{$data->total}}" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputharga" class="col-sm-3 col-form-label">Pembayaran</label>
            <div class="col-sm-9">
              <input type="number" onkeyup="kurang();" name="bayar" class="form-control" id="bayar" placeholder="Pembayaran ..." required>
              <span id="error"></span>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputharga" class="col-sm-3 col-form-label">Kembalian</label>
            <div class="col-sm-9">
              <input type="number" readonly value="" name="kembali" class="form-control" id="kembali" placeholder="Kembalian ..." required>
            </div>
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button onclick="valid();" type="" id="submit" name="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endforeach