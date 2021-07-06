@extends('layouts/user/template')
@section('title', 'Transaksi ')
@section('content')
<div class="card">
  <div class="row mt-4">
    <nav class="w-100">
      <div class="nav nav-tabs" id="product-tab" role="tablist">
        <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Menunggu Pembayaran</a>

        <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Lunas</a>
      </div>
    </nav>
    <div class="tab-content w-100 p-3" id="nav-tabContent">
      <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
        <table class="table w-100" style="width: 100%;">
          <thead>
            <tr>
              <th>No.</th>
              <th>Tgl. Transaksi</th>
              <th>No Transaksi</th>
              <th>No ID</th>
              <th>Nama Pasien</th>
              <th>Alamat</th>
              <th>Total</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            @foreach($tunggu as $data)

            <tr>
              <td><?= $no++; ?></td>
              <td>{{$data->tgl_transaksi}}</td>
              <td>{{$data->id_transaksi}}</td>
              <td>{{$data->no_id}}</td>
              <td>{{$data->nama}}</td>
              <td>{{$data->alamat}}</td>
              <td>{{$data->total}}</td>

              <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$data->id_transaksi}}">Bayar <i class="fas fa-arrow-right"></i></button>

              </td>
            </tr>
            @endforeach

          </tbody>
        </table>


      </div>

      <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
        <table class="table" style="width: 100%;">
          <thead>
            <tr>
              <th>No.</th>
              <th>Kode Obat</th>
              <th>Nama Obat</th>
              <th>Jenis</th>
              <th>Stok</th>
              <th>Harga</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            @foreach($selesai as $data)

            <tr>
              <td>{{$data->id_transaksi}}</td>
              <td>{{$data->nama}}</td>
              <td>{{$data->total}}</td>
              <td>{{$data->no_id}}</td>
              <td>{{$data->alamat}}</td>
              <td>{{$data->status}}</td>
              <td>
                SELESAI
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- /.card-body -->
</div>
@foreach($tunggu as $data)
<div class="modal fade" id="edit{{$data->id_transaksi}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Data Obat</h4>
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
              <input type="text" name="total" class="form-control" id="total" placeholder="Total Bayar ..." value="{{$data->total}}" required>
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
              <input type="number" value="" name="kembali" class="form-control" id="kembali" placeholder="Kembalian ..." required>
            </div>
          </div>
      </div>

      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button onclick="valid();" type="submit" id="submit" name="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
@endsection
@section('script')
<script>
  function kurang() {
    var dbil1 = document.getElementById('total').value
    var dbil2 = document.getElementById('bayar').value
    var result = parseFloat(dbil2) - parseFloat(dbil1);
    if (!isNaN(result)) {
      document.getElementById('kembali').value = result;
    }
  }
</script>
<script>
  function valid() {
    if (document.getElementById('kembali').value < 0) {
      alert('Pembayaran kurang !!!!')
      document.getElementById('submit').type = "button";
      document.getElementById('error').value = "pembayaran kurang";
    } else {
      document.getElementById('submit').type = "submit";
    }
  }
</script>
@endsection