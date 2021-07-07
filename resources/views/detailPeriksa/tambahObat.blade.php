<div class="col-6">
  <div class="form-group">

    <label>Tindakan</label>
    <p>{{$data->tindakan}}</p>
    <label>Keterangan</label>
    <p>{{$data->keterangan}}</p>
    @endforeach
  </div>
  @foreach($periksa as $data)
  <form method="POST" action="/proses/edit/{{$data->id_periksa}}">
    @method('POST')
    @csrf
    <input hidden type="text" value="{{$data->id_periksa}}">
    @endforeach
    <div class="form-group">
      <label>Nama Obat</label>
      <div class="row justify-content-between">
        <div class="col-6">
          <select name="id_obat" class="form-control select2" style="width: 100%;">
            @foreach($obat as $data)
            <option value="{{$data->id_obat}}">{{$data->nama_obat}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-2">
          <input type="number" required name="jumlah" placeholder="jumlah">
        </div>
        <div class="col-3">
          <button type="submit" class="btn btn-sm btn-success" style="width: 100%;">Tambah</button>
        </div>
      </div>
    </div>
  </form>
</div>